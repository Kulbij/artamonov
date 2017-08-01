<?php namespace Intertech\Forms\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Teams Model
 */
class Team extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_forms_teams';

    public $timestamps = true;

    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'massage' => 'required',
        'category' => 'required',
    ];

    public $attributeNames = [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'phone' => 'Телефон',
        'email' => 'Email',
        'massage' => 'Сообщение',
        'category' => 'Категория',
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
        'massage',
        'category_id'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['Intertech\Artemonovteam\Models\Category',
            'table' => 'intertech_artemonovteam_categories'
        ]
    ];
}
