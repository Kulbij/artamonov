<?php namespace Intertech\Artemonovteam\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Artical Model
 */
class Artical extends Model
{
    use Validation;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'title',
        'short_text',
        'description',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_articals';

    public $rules = [
        'title' => 'required',
        'short_text' => 'required',
        'slug' => [
            'required',
            'unique:intertech_artemonovteam_articals',
        ]
    ];

    public $attributeNames = [
        'title' => 'Название',
        'short_text' => 'Краткий текст',
        'slug' => 'Ссылка',
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'short_text',
        'description',
        'slug',
        'is_enabled',
        'video',
    ];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'tags' => ['Intertech\Artemonovteam\Models\Tag',
            'table' => 'intertech_artemonovteam_artical_tag',
        ],
    ];
    public $attachOne = [
        'image' => 'System\Models\File',
    ];
}
