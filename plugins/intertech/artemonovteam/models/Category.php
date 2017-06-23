<?php namespace Intertech\Artemonovteam\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use Intertech\Artemonovteam\Traits\PageTrait;
use October\Rain\Database\Traits\Validation;

/**
 * Category Model
 */
class Category extends Model
{
    use Validation, Sortable, PageTrait;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'name',
        'short_text',
        'description'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_categories';

    public $timestamps = false;

    public $rules = [
        'name' => 'required',
        'slug' => 'required|unique:intertech_artemonovteam_categories',
    ];

    public $attributeNames = [
        'name' => 'Название',
        'cms_page' => 'Страница',
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
        'short_text',
        'description',
        'video',
        'slug',
        'is_enabled'
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
