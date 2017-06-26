<?php namespace Intertech\Forms\Models;

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
        'full_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'program' => 'required',
    ];

    public $attributeNames = [
        'full_name' => 'Полное имя',
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
        'full_name',
        'phone',
        'email',
        'message'
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
}
