<?php namespace RainLab\User\Components;

use Lang;
use Auth;
use Mail;
use Event;
use Flash;
use Input;
use Request;
use Redirect;
use Validator;
use Exception;
use Carbon\Carbon;
use Cms\Classes\Page;
use ValidationException;
use ApplicationException;
use RainLab\User\Models\User;
use System\Models\MailSetting;
use Cms\Classes\ComponentBase;
use RainLab\User\Models\Settings as UserSettings;
use RainLab\User\Traits\ComponentsTrait;
use Intertech\Artemonovteam\Models\SocialSettings;

class Account extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.user::lang.account.account',
            'description' => 'rainlab.user::lang.account.account_desc'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirect' => [
                'title'       => 'rainlab.user::lang.account.redirect_to',
                'description' => 'rainlab.user::lang.account.redirect_to_desc',
                'type'        => 'dropdown',
                'default'     => ''
            ],
            'paramCode' => [
                'title'       => 'rainlab.user::lang.account.code_param',
                'description' => 'rainlab.user::lang.account.code_param_desc',
                'type'        => 'string',
                'default'     => 'code'
            ],
            'forceSecure' => [
                'title'       => 'Force secure protocol',
                'description' => 'Always redirect the URL with the HTTPS schema.',
                'type'        => 'checkbox',
                'default'     => 0
            ],
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ],
        ];
    }

    public function getRedirectOptions()
    {
        return [''=>'- none -'] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    
    public function onRun()
    {
        $this->page['user'] = $this->user();
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function getData()
    {
        /*
         * Redirect to HTTPS checker
         */
        if ($redirect = $this->redirectForceSecure()) {
            return $redirect;
        }

        /*
         * Activation code supplied
         */
        $routeParameter = $this->property('paramCode');

        if ($activationCode = $this->param($routeParameter)) {
            $this->onActivate($activationCode);
        }

        $this->page['user'] = $this->user();
        $this->page['loginAttribute'] = $this->loginAttribute();
        $this->page['loginAttributeLabel'] = $this->loginAttributeLabel();

        return [];
    }

    /**
     * Returns the logged in user, if available
     */
    public function user()
    {
        if (!Auth::check()) {
            return null;
        }

        return Auth::getUser();
    }

    /**
     * Returns the login model attribute.
     */
    public function loginAttribute()
    {
        return UserSettings::get('login_attribute', UserSettings::LOGIN_EMAIL);
    }

    /**
     * Returns the login label as a word.
     */
    public function loginAttributeLabel()
    {
        return $this->loginAttribute() == UserSettings::LOGIN_EMAIL
            ? Lang::get('rainlab.user::lang.login.attribute_email')
            : Lang::get('rainlab.user::lang.login.attribute_username');
    }

    /**
     * Sign in the user
     */
    public function onSignin()
    {
        try {
            /*
             * Validate input
             */
            $data = post();
            $rules = [
                'email'    => 'required|email|between:6,255',
                'password' => 'required|between:6,255'
            ];

            if (!array_key_exists('login', $data)) {
                $data['login'] = post('username', post('email'));
            }

            $validation = Validator::make($data, $rules, [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }
            
            if (post('email')) {
                $selectUser = User::where('email', post('email'))->first();

                if ($selectUser) {
                    if (!\Hash::check(post('password'), $selectUser->password)) {
                        throw new ValidationException(['password' => Lang::get('rainlab.user::lang.login.error.password')]);
                    }
                }
            }

            /*
             * Authenticate user
             */
            $credentials = [
                'login'    => array_get($data, 'login'),
                'password' => array_get($data, 'password')
            ];

            Event::fire('rainlab.user.beforeAuthenticate', [$this, $credentials]);

            $user = Auth::authenticate($credentials, true);

            /*
             * Redirect to the intended page after successful sign in
             */
            $redirectUrl = $this->pageUrl($this->property('redirect'))
                ?: $this->property('redirect');

            if ($redirectUrl = input('redirect', $redirectUrl)) {
                return Redirect::intended($redirectUrl);
            }
        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Translations for attribute name
     */
    public function attributeNames()
    {
        return [
            'last_name' => Lang::get('rainlab.user::lang.register.validation.last_name'),
            'first_name' => Lang::get('rainlab.user::lang.register.validation.first_name'),
            'patronymic' => Lang::get('rainlab.user::lang.register.validation.patronymic'),
            'phone1' => Lang::get('rainlab.user::lang.register.validation.phone1'),
            'email' => Lang::get('rainlab.user::lang.register.validation.email'),
            'password' => Lang::get('rainlab.user::lang.register.validation.password'),
            'vatin' => Lang::get('rainlab.user::lang.register.validation.vatin'),
            'street' => Lang::get('
                rainlab.user::lang.register.validation.street'),
            'house' => Lang::get('rainlab.user::lang.register.validation.house'),
            'flat' => Lang::get('rainlab.user::lang.register.validation.flat'),
            'phone2' => Lang::get('rainlab.user::lang.register.validation.phone2'),
            'old_password' => Lang::get('rainlab.user::lang.register.validation.old_password'),
            'password_confirmation' => Lang::get('rainlab.user::lang.register.validation.password_confirmation'),
        ];
    }

    public function userRules()
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'phone' => 'required',
            'email'    => 'required|email|between:6,255|unique:users',
            'password' => 'required|between:6,255|confirmed'
        ];
    }

    /**
     * Register the user
     */
    public function onRegister()
    {
        try {
            if (!UserSettings::get('allow_registration', true)) {
                throw new ApplicationException(Lang::get('rainlab.user::lang.account.registration_disabled'));
            }

            /*
             * Validate input
             */
            $data = post();

            if (!array_key_exists('password_confirmation', $data)) {
                $data['password_confirmation'] = post('password');
            }

            $validation = Validator::make($data, $this->userRules(), [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            /*
             * Register user
             */
            $requireActivation = UserSettings::get('require_activation', true);
            $automaticActivation = UserSettings::get('activate_mode') == UserSettings::ACTIVATE_AUTO;
            $userActivation = UserSettings::get('activate_mode') == UserSettings::ACTIVATE_USER;
            $user = Auth::register($data, $automaticActivation);

            /**
             * Send E-mail user and admin
             */
            $this->sendMail($user);

            /*
             * Automatically activated or not required, log the user in
             */
            if ($automaticActivation || !$requireActivation) {
                Auth::login($user);
            }

            /*
             * Redirect to the intended page after successful sign in
             */
            $redirectUrl = $this->pageUrl($this->property('redirect'))
                ?: $this->property('redirect');

            if ($redirectUrl = post('redirect', $redirectUrl)) {
                return Redirect::intended($redirectUrl);
            }

        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    public function sendMail($user)
    {

        Mail::send('rainlab.user::mail.register_user_for_admin', [
            'user' => $user,
            'date' => Carbon::now()->format('Y-m-d H:i')
        ], function($message) use ($user) {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name);
        });

        // Mail::send('rainlab.user::mail.register_user', [
        //     'user' => $user,
        //     'date' => Carbon::now()->format('Y-m-d H:i')
        // ], function($message) use ($user) {
        //     $message->to(MailSetting::get('sender_email'), MailSetting::get('sender_name'));
        // });
    }

    /**
     * Activate the user
     * @param  string $code Activation code
     */
    public function onActivate($code = null)
    {
        try {
            $code = post('code', $code);

            /*
             * Break up the code parts
             */
            $parts = explode('!', $code);
            if (count($parts) != 2) {
                throw new ValidationException(['code' => Lang::get('rainlab.user::lang.account.invalid_activation_code')]);
            }

            list($userId, $code) = $parts;

            if (!strlen(trim($userId)) || !($user = Auth::findUserById($userId))) {
                throw new ApplicationException(Lang::get('rainlab.user::lang.account.invalid_user'));
            }

            if (!$user->attemptActivation($code)) {
                throw new ValidationException(['code' => Lang::get('rainlab.user::lang.account.invalid_activation_code')]);
            }

            Flash::success(Lang::get('rainlab.user::lang.account.success'));

            /*
             * Sign in the user
             */
            Auth::login($user);

        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Rules for update user
     */
    public function updateUserRules($user)
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'phone' => 'required',
            'email'    => 'required|email|between:6,255|unique:users,email,' . $user->id
        ];
    }

    /**
     * Update the user
     */
    public function onUpdate()
    {
        try {
            if (!$user = $this->user()) {
                return;
            }

            $data = post();
            $rules = $this->updateUserRules($user);

            if (post('old_password')) {
                $rules['old_password'] = 'required|between:6,255';
                $rules['password'] = 'required|between:6,255|confirmed';
                $rules['password_confirmation'] = 'required_with:password|between:6,255';
                if (\Hash::check(post('old_password'), $user->password)) {
                    $user->password = bcrypt(post('password'));
                } else {
                    throw new ValidationException(['old_password' => Lang::get('rainlab.user::lang.update.error.old_password')]);
                }
            }

            $validation = Validator::make($data, $rules, [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $user->fill($data);
            $user->save();

            /*
             * Password has changed, reauthenticate the user
             */
            if (strlen(post('password'))) {
                Auth::login($user->reload(), true);
            }

            Flash::success(post('flash', Lang::get('rainlab.user::lang.account.success_saved')));

            return Redirect::to(Request::url());
        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Deactivate user
     */
    public function onDeactivate()
    {
        if (!$user = $this->user()) {
            return;
        }

        if (!$user->checkHashValue('password', post('password'))) {
            throw new ValidationException(['password' => Lang::get('rainlab.user::lang.account.invalid_deactivation_pass')]);
        }

        $user->delete();
        Auth::logout();

        Flash::success(post('flash', Lang::get('rainlab.user::lang.account.success_deactivation')));

        /*
         * Redirect
         */
        if ($redirect = $this->makeRedirection()) {
            return $redirect;
        }
    }

    /**
     * Trigger a subsequent activation email
     */
    public function onSendActivationEmail()
    {
        try {
            if (!$user = $this->user()) {
                throw new ApplicationException(Lang::get('rainlab.user::lang.account.login_first'));
            }

            if ($user->is_activated) {
                throw new ApplicationException(Lang::get('rainlab.user::lang.account.already_active'));
            }

            Flash::success(Lang::get('rainlab.user::lang.account.activation_email_sent'));

            $this->sendActivationEmail($user);

        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }

        /*
         * Redirect
         */
        if ($redirect = $this->makeRedirection()) {
            return $redirect;
        }
    }

    /**
     * Sends the activation email to a user
     * @param  User $user
     * @return void
     */
    protected function sendActivationEmail($user)
    {
        $code = implode('!', [$user->id, $user->getActivationCode()]);
        $link = $this->currentPageUrl([
            $this->property('paramCode') => $code
        ]);

        $data = [
            'name' => $user->name,
            'link' => $link,
            'code' => $code
        ];

        Mail::send('rainlab.user::mail.activate', $data, function($message) use ($user) {
            $message->to($user->email, $user->name);
        });
    }

    /**
     * Redirect to the intended page after successful update, sign in or registration.
     * The URL can come from the "redirect" property or the "redirect" postback value.
     * @return mixed
     */
    protected function makeRedirection()
    {
        $redirectUrl = $this->pageUrl($this->property('redirect'))
            ?: $this->property('redirect');

        if ($redirectUrl = post('redirect', $redirectUrl)) {
            return Redirect::to($redirectUrl);
        }
    }

    /**
     * Checks if the force secure property is enabled and if so
     * returns a redirect object.
     * @return mixed
     */
    protected function redirectForceSecure()
    {
        if (
            Request::secure() ||
            Request::ajax() ||
            !$this->property('forceSecure')
        ) {
            return;
        }

        return Redirect::secure(Request::path());
    }
}
