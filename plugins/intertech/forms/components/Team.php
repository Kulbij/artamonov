<?php namespace Intertech\Forms\Components;

use Lang;
use Flash;
use Request;
use Redirect;
use Validator;
use ValidationException;
use Cms\Classes\ComponentBase;
use Intertech\Forms\Models\Team as ModelTeam;
use Intertech\Artemonovteam\Models\Category;
use Intertech\Forms\Traits\ComponentsTrait;

use Carbon\Carbon;

class Team extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Team Component',
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
        $categories = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();

        return [
            'categories' => $categories
        ];
    }

    /**
     * Translations for attribute name
     */
    // public function attributeNames()
    // {
    //     return [
    //         'first_name' => Lang::get('rainlab.user::lang.register.validation.first_name'),
    //         'email' => Lang::get('rainlab.user::lang.register.validation.email'),
    //     ];
    // }

    public function onSend()
    {
        $categoryId = post('category_id');
        $category = Category::find($categoryId);

        if ($category) {
            $team = new ModelTeam;

            $team->fill(post());
            $team->save();

            if ($team) {
                $this->sendMail($team);
                Flash::success('Форма успешнон отправлена');

                return Redirect::to(Request::url());
            }
        }

        Flash::error('Ошыбка формы');
    }

    public function sendMail($team)
    {
        Mail::send('Intertech.forms::mail.admin_callback', [
            'team' => $team,
            'date' => Carbon::now()->format('Y-m-d H:i')
        ], function($message) use ($user) {
            $message->to($team->email, $team->first_name . ' ' . $team->last_name)->subject('Хочу в команду');
        });
    }
}
