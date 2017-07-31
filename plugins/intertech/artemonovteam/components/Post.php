<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Artical;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Post extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Post Component',
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
        $post = Artical::where('slug', $this->property('slug'))->first();

        return [
            'post' => $post
        ];
    }
}
