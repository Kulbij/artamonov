<?php namespace Intertech\Artemonovteam\Components;

use Request;
use Cms\Classes\ComponentBase;
use Intertech\Artemonovteam\Models\Tag;
use Intertech\Artemonovteam\Models\Artical;
use Intertech\Artemonovteam\Traits\ComponentsTrait;

class Posts extends ComponentBase
{
    use ComponentsTrait;

    const LIMIT_PRODUCTS = 10;

    public function componentDetails()
    {
        return [
            'name'        => 'Posts Component',
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
        $tagId = Request::get('tag');

        $posts = Artical::where('is_enabled', true)
            ->whereHas('tags', function($query) use ($tagId) {
                if (Tag::find($tagId)) {
                    $query->where('intertech_artemonovteam_tags.id', $tagId);
                }
            })->orderBy('created_at', 'desc')->paginate(self::LIMIT_PRODUCTS);

        list($from, $to) = $this->getPages($posts);

        return [
            'posts' => $posts,
            'from' => $from,
            'to' => $to
        ];
    }

    /**
     * @param $posts
     * @return array
     */
    public function getPages($posts)
    {
        $from = $posts->currentPage() - 4;
        $to =  $posts->currentPage() + 4;

        if ($from <= 1) {
            $from = 2;
        }

        if ($to >= $posts->lastPage()) {
            $to = $posts->lastPage() - 1;
        }

        return [
            $from,
            $to,
        ];
    }
}
