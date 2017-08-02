<?php namespace Intertech\Artemonovteam\Components;

use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Category;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Categories extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Categories Component',
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
        $categories = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();
        $twoCategory = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->skip(0)->take(2)->get();
        $lastCategory = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->skip(2)->take(4)->get();

        return [
            'categories' => $categories,
            'two_category' => $twoCategory,
            'last_category' => $lastCategory
        ];
    }

    public function onShowModal()
    {
        $id = post('id');

        $category = Category::find($id);

        if ($category) {
            $this->page['category'] = $category;
        }
    }
}
