<?php namespace Intertech\Seo\Models;

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
        'title',
        'description',
        'keywords',
        'og_title',
        'og_description',
    ];

    /**
     * @var string
     */
    public $settingsCode = 'intertech_seo_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    /**
     * @var array
     */
    public $attachOne = [
        'og_image' => 'System\Models\File',
    ];
}
