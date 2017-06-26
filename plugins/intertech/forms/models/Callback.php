<?php namespace Intertech\Forms\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Callback Model
 */
class Callback extends Model
{
    use Validation;

    public $timestamps = true;

    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
    ];

    public $attributeNames = [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'phone' => 'Телефон',
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_forms_callbacks';

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
        'gender',
        'massage',
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
