<?php namespace Intertech\Forms\Components;

use Mail;
use Lang;
use Flash;
use Redirect;
use Exception;
use Carbon\Carbon;
use ValidationException;
use System\Models\MailSetting;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Intertech\Forms\Models\Feedback as FeedbackModel;
use Intertech\Forms\Traits\ComponentsTrait;
use Intertech\Korkki\Models\ContactSettings;
use Intertech\Korkki\Models\SocialSettings;
use Feegleweb\Octoshop\Models\FrontendSettings;

class Feedback extends ComponentBase
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
        return [
            'contactSettings' => ContactSettings::instance(),
        ];
    }

    public function attributeNames()
    {
        return [
            'full_name' => 'Полное имя',
            'email' => 'Email',
            'message' => 'Сообщение',
            'type' => 'Тип формы'
        ];
    }

    /**
     * Send feedback
     */
    public function onSend()
    {
        try {
            $data = post();

            $rules = [
                'full_name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'type' => 'integer|max:2|min:1',
            ];

            $validation = Validator::make($data, $rules, [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $model = new FeedbackModel();
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
            // Mail::send('intertech.forms::mail.user_feedback', [
            //     'data' => $data,
            //     'text' => $data['message'],
            //     'socials' => $socials,
            //     'date' => Carbon::now()->format('Y-m-d H:i')
            // ], function($message) {
            //     $message->to($data['email'], MailSetting::get('sender_name'));
            // });
        // }

        if (FrontendSettings::get('mail')->send_admin_confirmation) {
            Mail::send('intertech.forms::mail.admin_feedback', [
                'data' => $data,
                'text' => $data['message'],
                'socials' => $socials,
                'date' => Carbon::now()->format('Y-m-d H:i')
            ], function($message) {
                $message->to(MailSetting::get('sender_email'), MailSetting::get('sender_name'));
            });
        }
    }
}
