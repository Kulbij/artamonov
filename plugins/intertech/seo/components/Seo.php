<?php namespace Intertech\Seo\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Request;
use Intertech\Seo\Models\Seo as SeoModel;

class Seo extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Seo Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $url = Request::path();
        $url = '/' . trim($url, '/');

        $seo = SeoModel::findByUrlMask($url);
        $seo->og_url = app('url')->full();

        $this->page['seo'] = $seo;
    }
}
