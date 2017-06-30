<?php namespace Intertech\Artemonovteam\Models;

use Model;

/**
 * ContactSettings Model
 */
class ContactSettings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
        'address'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $settingsCode = 'intertech_artemonovteam_contact_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';
}
