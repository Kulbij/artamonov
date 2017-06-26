<?php

namespace Intertech\Subscribe\Handlers;

use Cart;
use Intertech\Subscribe\Models\Subscriber;
use Intertech\Subscribe\Traits\HandlersTrait;
use Rainlab\Translate\Models\Message;
use Illuminate\Support\Facades\Redirect;
use October\Rain\Support\Facades\Flash;
use Illuminate\Support\Facades\Mail;
use Intertech\Subscribe\Models\Settings as SubscribeSettings;

class ProcessSubscribers
{
    use HandlersTrait;

    public function unsubscribe($key)
    {
        $subscriber = Subscriber::where('secret_key', $key)->first();

        if ($subscriber) {
            $subscriber->delete();

            if ($mailTemplate = SubscribeSettings::get('unsubscribe_template')) {
                Mail::sendTo($subscriber->email, $mailTemplate);
            }

            Flash::success(Message::trans('Вы успешно отписались от рассылки'));
        } else {
            Flash::error(Message::trans('Подписчик не найден'));
        }

        return Redirect::to('/');
    }
}
