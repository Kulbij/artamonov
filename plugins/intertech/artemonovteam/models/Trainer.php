<?php namespace Intertech\Artemonovteam\Models;

use Flash;
use Model;
use October\Rain\Database\Traits\Sortable;
use Intertech\Artemonovteam\Traits\PageTrait;
use October\Rain\Database\Traits\Validation;

/**
 * Trainers Model
 */
class Trainer extends Model
{
    use Validation, Sortable, PageTrait;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'full_name',
        'description',
        'position'
    ];

    public $jsonable = ['socials'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_trainers';

    public $rules = [
        'full_name' => 'required',
        'description' => 'required'
    ];

    public $attributeNames = [
        'full_name' => 'Название',
        'description' => 'Описание',
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
        'description',
        'is_enabled',
        'position',
        'socials'
    ];

    /**
     * @var array Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File',
    ];

    public function beforeSave()
    {
        Flash::success('Тренер был успешно сохранен');
    }
}
