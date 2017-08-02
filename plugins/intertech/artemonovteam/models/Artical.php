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

    protected $dates = [
        'event'
    ];

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
        'tag_id',
    ];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'tags' => ['Intertech\Artemonovteam\Models\Tag',
            'table' => 'intertech_artemonovteam_artical_tag',
            'key' => 'artical_id'
        ],
    ];

    public $attachOne = [
        'image' => 'System\Models\File',
    ];

    public function scopeFilterTags($query, array $tags)
    {
        return $query->whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('intertech_artemonovteam_tags.id', $tags);
        });
    }
}
