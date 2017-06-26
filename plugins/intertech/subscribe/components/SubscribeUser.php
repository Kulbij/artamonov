<?php namespace Intertech\Subscribe\Components;

use Cms\Classes\ComponentBase;
use Intertech\Subscribe\Models\Subscriber;
use Intertech\Subscribe\Traits\ComponentsTrait;
use Illuminate\Support\Facades\Mail;
use October\Rain\Support\Facades\Flash;
use Rainlab\Translate\Models\Message;
use Intertech\Subscribe\Models\Settings as SubscribeSettings;

class SubscribeUser extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'SubscribeUser Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    public function onSubscriberUser()
    {
        $subscriber = Subscriber::create([
            'email' => post('email'),
            'type' => Subscriber::TYPE_DEFAULT,
        ]);
        
        if ($mailTemplate = SubscribeSettings::get('subscribe_template')) {
            Mail::sendTo($subscriber->email, $mailTemplate, ['user' => $subscriber]);
        }

        Flash::success(Message::trans('Вы успешно подписались'));
    }
}
