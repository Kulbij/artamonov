<?php namespace Intertech\Forms\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Feedback Model
 */
class Feedback extends Model
{
    use Validation;

    public $timestamps = true;

    public $rules = [
        'full_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    public $attributeNames = [
        'full_name' => 'Полное имя',
        'phone' => 'Телефон',
        'email' => 'Email',
        'message' => 'Сообщение',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_forms_feedbacks';

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
        'message',
        'created_at'
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
