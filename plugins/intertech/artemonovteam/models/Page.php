<?php namespace Intertech\Artemonovteam\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use Intertech\Artemonovteam\Traits\PageTrait;
use October\Rain\Database\Traits\Validation;

/**
 * Pages Model
 */
class Page extends Model
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
    public $table = 'intertech_artemonovteam_pages';

    public $timestamps = false;

    public $rules = [
        'name' => 'required',
        'cms_page' => 'required|unique:intertech_artemonovteam_pages',
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
        'cms_page',
        'slug'
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
