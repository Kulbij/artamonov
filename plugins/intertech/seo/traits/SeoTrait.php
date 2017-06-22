<?php

namespace Intertech\Seo\Traits;

use Intertech\Seo\Models\Seo;
use Intertech\Seo\Models\Settings;

trait SeoTrait
{
    public static function findByUrlMask($url)
    {
        $seo = Seo::where('url_mask', $url)->first();

        if (isset($seo)) {
            return $seo;
        }

        $urls = self::getUrlMasks($url);

        foreach ($urls as $url) {
            $seo = Seo::where('url_mask', $url)->first();

            if (isset($seo)) {
                return $seo;
            }
        }

        $settings = Settings::instance();

        return $settings;
    }

    public static function getUrlMasks($url)
    {
        $segments = explode('/', $url);
        $count = sizeof($segments);

        $urls = [];
        for ($i = 1; $i < $count; $i++) {
            $segments[$count - $i] = '*';

            $urls[] = implode('/', $segments);

            array_pop($segments);
        }

        return $urls;
    }
}
