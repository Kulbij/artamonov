<?php namespace Intertech\Subscribe\Models;

use Model;
use System\Models\MailTemplate;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string
     */
    public $settingsCode = 'intertech_subscribe_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    public function listTemplates($value, $fieldName, $formData)
    {
        $codes = array_keys(MailTemplate::listAllTemplates());

        $result = ['' => '- Не отправлять уведомление -'];
        $result += array_combine($codes, $codes);

        return $result;
    }

    public function getActiveTemplateOptions()
    {
        $codes = array_keys(MailTemplate::listAllTemplates());

        $result = array_combine($codes, $codes);

        return $result;
    }
}
