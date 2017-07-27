<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Page;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Pages extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Pages Component',
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
        $pages = Page::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();

        return [
            'pages' => $pages
        ];
    }
}
