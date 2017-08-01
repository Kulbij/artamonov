<?php namespace Intertech\Forms\Components;

use Flash;
use Request;
use Redirect;
use Cms\Classes\ComponentBase;
use Intertech\Forms\Models\AskQuestion as ModelAskQuestion;
use Intertech\Forms\Traits\ComponentsTrait;

class AskQuestion extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'AskQuestion Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ]
        ];
    }

    public function getData()
    {
        return [
            
        ];
    }

    public function onSend()
    {
        $team = new ModelAskQuestion;

        $team->fill(post());
        $team->save();

        if ($team) {
            Flash::success('Форма успешнон отправлена');

            return Redirect::to(Request::url());
        }

        Flash::error('Ошыбка формы');
    }
}
