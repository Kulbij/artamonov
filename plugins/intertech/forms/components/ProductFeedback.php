<?php namespace Intertech\Forms\Components;

use Flash;
use Request;
use Redirect;
use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Program;
use Intertech\Forms\Models\ProgramFeedback;
use Intertech\Forms\Traits\ComponentsTrait;

class ProductFeedback extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'ProductFeedback Component',
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

    public function onShowForm()
    {
        $id = post('id');

        $program = Program::find($id);

        if ($program) {
            $this->page['formprogram'] = $program;
        }
    }

    public function onSend()
    {
        $id = post('program_id');

        $program = Program::find($id);

        if ($program) {
            $team = new ProgramFeedback;

            $team->fill(post());
            $team->save();

            if ($team) {
                Flash::success('Форма успешнон отправлена');

                return Redirect::to(Request::url());
            }
        }

        Flash::error('Ошыбка формы');
    }
}
