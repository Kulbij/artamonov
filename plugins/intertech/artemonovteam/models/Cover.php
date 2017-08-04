<?php namespace Intertech\Artemonovteam\Models;

use Flash;
use Model;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;

/**
 * Cover Model
 */
class Cover extends Model
{
    use Validation, Sortable;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'name',
        'description'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_covers';

    public $rules = [
        'name' => 'required',
        'link' => 'url'
    ];

    public $attributeNames = [
        'name' => 'Название',
        'link' => 'Ссылка',
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
        'link',
        'description',
        'is_botton',
        'is_main'
    ];

    /**
     * @var array Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File',
    ];

    public function beforeSave()
    {
        if ($this->is_main) {
            $this->where('is_main', true)->update([
                'is_main' => false
            ]);
        }
    }
    
    public function beforeSave()
    {
        Flash::success('Обложка была успешно сохранена');
    }
}
