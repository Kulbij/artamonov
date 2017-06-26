<?php namespace Intertech\Subscribe\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Mail;
use October\Rain\Support\Facades\Flash;
use Intertech\Subscribe\Models\Subscriber;
use Intertech\Subscribe\Models\Settings as SubscribeSettings;

/**
 * Subscribers Back-end Controller
 */
class Subscribers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Intertech.Subscribe', 'subscribe', 'subscribers');
    }

    public function onSendMailToSubscribers()
    {
        try {
            $ids = post('checked');

            $subscribers = Subscriber::whereIn('id', $ids)->get();

            foreach ($subscribers as $subscriber) {
                if ($mailTemplate = SubscribeSettings::get('active_template')) {
                    Mail::sendTo($subscriber->email, $mailTemplate, ['user' => $subscriber]);
                }
            }

            Flash::success('Сообщения успешно отправлены');
        } catch (\Exception $e) {
            Flash::error('Ошибка! Что-то пошло не так');
        }
    }
}
