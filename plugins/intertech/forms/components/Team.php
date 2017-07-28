<?php namespace Intertech\Forms\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Category;
use Intertech\Forms\Traits\ComponentsTrait;

class Team extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Team Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ],
        ];
    }

    public function getData()
    {
        $categories = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();

        return [
            'categories' => $categories
        ];
    }
}
