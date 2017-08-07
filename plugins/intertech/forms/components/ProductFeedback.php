<?php namespace Intertech\Forms\Components;

use Auth;
use Mail;
use Flash;
use Request;
use Redirect;
use Carbon\Carbon;
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
                $user = Auth::getUser();
                if ($user) {
                    $user->programsUser()
                        ->attach($program->id);
                }

                $this->sendMail($team, $program);
                Flash::success('Форма успешно отправлена');

                return Redirect::to(Request::url());
            }
        }

        Flash::error('Ошибка формы');
    }

    public function sendMail($team, $program)
    {
        Mail::send('intertech.forms::mail.admin_callback', [
            'team' => $team,
            'program' => $program,
            'date' => Carbon::now()->format('Y-m-d H:i')
        ], function($message) use ($team, $program) {
            $message->to($team->email, $team->first_name . ' ' . $team->last_name)->subject($program->name);
        });
    }
}
