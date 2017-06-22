<?php namespace Intertech\Artemonovteam\Traits;

use Cms\Classes\Page;

trait PageTrait
{
    /**
     * @return array
     */
    public function getCmsPageOptions()
    {
        $pages = Page::sortBy('baseFileName');

        $options = [
            '' => 'Select cms page'
        ];

        foreach($pages as $value)
        {
            if(strpos($value->title, ':') === false)
                $options[$value->baseFileName] = $this->getCmsPageName($value);// . ', ' . $value->title;
        }

        return $options;
    }

    /**
     * @param $page
     * @return string
     */
    public function getCmsPageName($page)
    {
        return !empty($page->title) ? $page->title : $page->baseFileName.'.htm';
    }

    /**
     * @param $filename
     * @return mixed
     */
    public function findCmsPageByFilename($filename)
    {
        $page = Page::sortBy('baseFileName');

        return array_first($page, function ($key, $item) use ($filename) {
            return $item->baseFileName == $filename;
        });
    }
}