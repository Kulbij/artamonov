<?php namespace Intertech\Forms\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * AskQuestion Model
 */
class AskQuestion extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_forms_ask_questions';

    public $timestamps = true;

    public $rules = [
        'full_name' => 'required',
        'email' => 'required|email',
        'massage' => 'required'
    ];

    public $attributeNames = [
        'full_name' => 'Полное имя',
        'email' => 'Email',
        'massage' => 'Сообщение'
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
        'email',
        'massage'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
