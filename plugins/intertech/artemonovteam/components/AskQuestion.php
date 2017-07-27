<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class AskQuestion extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'AskQuestion Component',
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
            
        ];
    }
}
