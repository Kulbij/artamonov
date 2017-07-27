<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Cover as ModelCover;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Cover extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Covers Component',
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
        $cover = ModelCover::where('is_main', true)->first();

        return [
            'cover' => $cover
        ];
    }
}
