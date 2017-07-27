<?php namespace Intertech\Artemonovteam\Models;

use Model;

/**
 * SocialSettings Model
 */
class SocialSettings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [];

    /**
     * @var string The database table used by the model.
     */
    public $settingsCode = 'intertech_artemonovteam_social_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';
}
