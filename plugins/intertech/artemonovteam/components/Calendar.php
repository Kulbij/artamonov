<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Settings;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Calendar extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Calendar Component',
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
            'calendar' => Settings::instance()
        ];
    }
}
