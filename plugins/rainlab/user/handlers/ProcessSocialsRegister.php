<?php namespace RainLab\User\Handlers;

use Lang;
use Cart;
use Mail;
use Flash;
use Session;
use Socialite;
use Exception;
use Carbon\Carbon;
use ApplicationException;
use RainLab\User\Models\User;
use RainLab\User\Facades\Auth;
use System\Models\MailSetting;
use RainLab\User\Traits\HandlersTrait;
use Illuminate\Support\Facades\Redirect;
use RainLab\User\Models\Settings as UserSettings;
use Intertech\Korkki\Models\SocialSettings;
use Feegleweb\Octoshop\Models\FrontendSettings;

class ProcessSocialsRegister
{
    use HandlersTrait;

    public $client_id;
    public $client_secret;
    public $redirect;

    public function __construct()
    {
    	$this->client_id = config('services.vkontakte.client_id');
	    $this->client_secret = config('services.vkontakte.client_secret');
	    $this->redirect = config('services.vkontakte.redirect');
    }

    /**
     * Auth for Facebook
     */

    public function authFacebook()
    {
        return Socialite::driver('facebook')
            ->scopes(['public_profile', 'email'])
            ->redirect();
    }

 	public function registerFacebook()   
 	{
 		$facebookUser = Socialite::driver('facebook')->fields([
	        'first_name', 'last_name', 'email', 'gender', 'name',
	    ])->user();

	    $user = User::where('email', $facebookUser->email)->first();

	    try {
	        if (!$user) {
	            if (!UserSettings::get('allow_registration', true)) {
	                throw new ApplicationException(Lang::get('rainlab.user::lang.account.registration_disabled'));
	            }

	            if (!isset($facebookUser->user['email'])) {
	                throw new ApplicationException(Lang::get('rainlab.user::lang.account.fb_no_email'));
	            }

	            $password = str_random(6);

	            $user = new User();
	            $user->email = $facebookUser->user['email'];
	            $user->first_name = $facebookUser->user['first_name'];
	            $user->last_name = $facebookUser->user['last_name'];
	            $user->password = $password;
	            $user->password_confirmation = $password;
	            $user->is_activated = true;
	            $user->activated_at = Carbon::now();
	            $user->phone = '';

	            $user->forceSave();

	            $this->sendMailUser($user, $password);
	        }

	        if (UserSettings::get('use_throttle', true)) {
	            $throttle = Auth::findThrottleByUserId($user->id);
	            $throttle->check();
	        }

	        Auth::login($user);
	    } catch (Exception $ex) {
	        Flash::error($ex->getMessage());

	        return Redirect::to('/');
	    }

	    return Redirect::to('/account');
 	}

 	/**
 	 * Send E-mail after register user
 	 */
 	public function sendMailUser($user, $password)
    {
    	$socials = SocialSettings::instance();

    	if (FrontendSettings::get('mail')->send_customer_confirmation) {
	        Mail::send('rainlab.user::mail.register_user_auth_for_admin', [
                'user' => $user,
                'socials' => $socials,
                'password' => $password,
                'date' => Carbon::now()->format('Y-m-d H:i')
            ], function($message) use ($user) {
                $message->to($user->email, $user->first_name . ' ' . $user->last_name);
            });
	    }

	    if (FrontendSettings::get('mail')->send_admin_confirmation) {
	        Mail::send('rainlab.user::mail.register_user_auth', [
                'user' => $user,
                'socials' => $socials,
                'password' => $password,
                'date' => Carbon::now()->format('Y-m-d H:i')
            ], function($message) use ($user) {
                $message->to(MailSetting::get('sender_email'), MailSetting::get('sender_name'));
            });
	    }
    }
}