<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Page;
use Intertech\Artemonovteam\Models\Trainer;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Trainers extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Trainers Component',
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
            'slug' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ]
        ];
    }

    public function getData()
    {
        $slug = $this->property('slug');
        $page = Page::where('cms_page', $slug)->first();

        $trainers = Trainer::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();
        
        return [
            'page' => $page,
            'trainers' => $trainers
        ];
    }
}
