<?php namespace Intertech\Artemonovteam\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'about'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $settingsCode = 'intertech_artemonovteam_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    /**
     * @var array Relations
     */
    public $attachOne = [
        'dream_image' => 'System\Models\File',
    ];
}
