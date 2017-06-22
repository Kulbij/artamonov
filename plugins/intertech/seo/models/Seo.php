<?php namespace Intertech\Seo\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use Intertech\Seo\Traits\SeoTrait;

/**
 * Seo Model
 */
class Seo extends Model
{
    use Validation, SeoTrait;

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'title',
        'description',
        'keywords',
        'og_title',
        'og_description',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_seo_seo';

    /**
     * @var bool
     */
    public $timestamps = false;

    public $rules = [
        'url_mask' => 'required|unique:intertech_seo_seo',
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'url_mask',
        'title',
        'description',
        'keywords',
        'canonical',
        'additional_tags',
        'og_title',
        'og_description',
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
    public $attachOne = [
        'og_image' => 'System\Models\File',
    ];
    public $attachMany = [];

    public function setUrlMaskAttribute($value)
    {
        $this->attributes['url_mask'] = '/' . trim($value, '/');
    }
}
