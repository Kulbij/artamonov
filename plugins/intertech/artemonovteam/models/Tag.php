<?php namespace Intertech\Artemonovteam\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use Intertech\Artemonovteam\Traits\PageTrait;
use October\Rain\Database\Traits\Validation;

/**
 * Tag Model
 */
class Tag extends Model
{
    use Validation, Sortable, PageTrait;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'name'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_tags';

    public $timestamps = false;

    public $rules = [
        'name' => 'required'
    ];

    public $attributeNames = [
        'name' => 'Название'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'is_enabled'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'articals' => ['Intertech\Artemonovteam\Models\Artical',
            'table' => 'intertech_artemonovteam_artical_tag'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
