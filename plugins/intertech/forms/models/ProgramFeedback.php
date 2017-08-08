<?php namespace Intertech\Forms\Models;

use Flash;
use Model;
use October\Rain\Database\Traits\Validation;

/**
 * ProgramFeedback Model
 */
class ProgramFeedback extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_forms_program_feedbacks';

    public $timestamps = true;

    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'program' => 'required',
    ];

    public $attributeNames = [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'phone' => 'Телефон',
        'email' => 'Email',
        'message' => 'Сообщение',
        'program' => 'Программа',
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'message',
        'program_id'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'program' => ['Intertech\Artemonovteam\Models\Program',
            'table' => 'intertech_artemonovteam_programs'
        ]
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function beforeSave()
    {
        Flash::success('Обратная связь программы была успешно сохранена');
    }
}
