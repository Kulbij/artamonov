<?php namespace Intertech\Artemonovteam\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Program;
use Intertech\Artemonovteam\Models\Category;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Programs extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'Programs Component',
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

    public function generateData()
    {
        $programs = Program::where('is_enabled', true)
            ->orderBy('sort_order', 'asc')->get();

        $categories = $this->generateCategories();

        return [
            'programs' => $programs,
            'categories' => $categories
        ];
    }

    public function generateCategories()
    {
        return $categories = Category::where('is_enabled', true)->orderBy('sort_order', 'asc')->get();
    }

    public function getData()
    {
        return $this->generateData();
    }

    public function onFiltred()
    {
        $id = post('id');

        $category = Category::find($id);

        if ($category) {
            $programs = Program::where('is_enabled', true)
                ->where('category_id', $id)
                ->orderBy('sort_order', 'asc')->get();

            $this->page['programs'] = $programs;
        }

        if (!$category) {
            $this->page['programs'] = Program::where('is_enabled', true)
            ->orderBy('sort_order', 'asc')->get();
        }
    }

    public function onShowProgram()
    {
        $id = post('id');

        $program = Program::find($id);

        if ($program) {
            $this->page['program'] = $program;
        }

        $this->page['user'] = Auth::getUser();
    }
}
