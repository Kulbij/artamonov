<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Settings;
use Intertech\Artemonovteam\Models\ContactSettings;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Footer extends ComponentBase
{
    use ComponentsTrait;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Footer Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ]
        ];
    }

    public function getData()
    {
        return [
            'setting' => Settings::instance(),
            'contact' => ContactSettings::instance()
        ];
    }
}
