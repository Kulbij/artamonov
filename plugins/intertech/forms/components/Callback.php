<?php namespace Intertech\Forms\Components;

use Mail;
use Lang;
use Flash;
use Request;
use Redirect;
use Exception;
use Validator;
use Carbon\Carbon;
use ValidationException;
use Cms\Classes\ComponentBase;
use System\Models\MailSetting;
use Intertech\Forms\Models\Callback as ModelCallback;
use Intertech\Korkki\Models\SocialSettings;
use Intertech\Forms\Traits\ComponentsTrait;
use Feegleweb\Octoshop\Models\FrontendSettings;

class Callback extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Callback Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ],
        ];
    }

    public function getData()
    {
        return [];
    }

    /**
     * Translations for attribute name
     */
    public function attributeNames()
    {
        return [
            'first_name' => Lang::get('rainlab.user::lang.register.validation.first_name'),
            'phone1' => Lang::get('rainlab.user::lang.register.validation.phone1'),
        ];
    }

    /**
     * Send callback
     */
    public function onSend()
    {
        try {
            $data = post();

            $rules = [
                'name' => 'required',
                'phone' => 'required|min:15'
            ];

            $validation = Validator::make($data, $rules, [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $model = new ModelCallback;
            $model->fill($data);
            $model->save();


            $this->sendMail($data);

            Flash::success(Lang::get('intertech.forms::lang.callback.success_send_form'));
            
            return Redirect::to(Request::url());
        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Send email after create callback in DB
     */
    public function sendMail($data)
    {
        $socials = SocialSettings::instance();

        // if (FrontendSettings::get('mail')->send_customer_confirmation) {
            // Mail::send('intertech.forms::mail.user_callback', [
            //     'data' => $data,
            //     'socials' => $socials,
            //     'date' => Carbon::now()->format('Y-m-d H:i')
            // ], function($message) {
            //     $message->to($data['email'], MailSetting::get('sender_name'));
            // });
        // }

        if (FrontendSettings::get('mail')->send_admin_confirmation) {
            Mail::send('intertech.forms::mail.admin_callback', [
                'data' => $data,
                'socials' => $socials,
                'date' => Carbon::now()->format('Y-m-d H:i')
            ], function($message) {
                $message->to(MailSetting::get('sender_email'), MailSetting::get('sender_name'));
            });
        }
    }
}
