<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Artical;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class UpWorkuuts extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'UpWorkuuts Component',
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
        $articals = Artical::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();
        
        return [
            'articals' => $articals
        ];
    }
}
