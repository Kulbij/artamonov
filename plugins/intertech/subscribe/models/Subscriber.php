<?php namespace Intertech\Subscribe\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Subscriber Model
 */
class Subscriber extends Model
{
    use Validation;

    const TYPE_WHOLESALE = 1;
    const TYPE_RETAIL = 2;
    const TYPE_DEFAULT = 3;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_subscribe_subscribers';

    public $rules = [
        'email' => 'required|email|unique:intertech_subscribe_subscribers',
        'type' => 'required',
    ];

    public $attributeNames = [
        'email' => 'Email',
        'type' => 'Тип',
    ];

    public $customMessages = [
        'email.required' => 'intertech.subscribe::lang.email.required',
        'email.email' => 'intertech.subscribe::lang.email.email',
        'email.unique' => 'intertech.subscribe::lang.email.unique',
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
        'secret_key',
        'type',
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

    public function getTypeOptions()
    {
        return [
            self::TYPE_WHOLESALE => 'Оптовый',
            self::TYPE_RETAIL => 'Розничный',
            self::TYPE_DEFAULT => 'Стандартный',
        ];
    }

    public function beforeCreate()
    {
        $this->secret_key = hash('md5', $this->email);
    }
}
