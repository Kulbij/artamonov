<?php

namespace Intertech\Subscribe\Traits;

trait HandlersTrait
{
    public function getAfterFilters()
    {
        return [];
    }

    public function getBeforeFilters()
    {
        return [];
    }

    public function getMiddleware()
    {
        return [];
    }

    public function callAction($method, $parameters)
    {
        return call_user_func_array([$this, $method], $parameters);
    }
}
