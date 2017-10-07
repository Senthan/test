<?php

if (! function_exists('carbon')) {
    function carbon($time = null, $tz = null)
    {
        return new \Carbon\Carbon($time, $tz);
    }
}
if (! function_exists('clearModelCache')) {
    function clearModelCache($model)
    {
        $cacheName = $model;
        if(!is_string($model)) {
            $cacheName = str_replace('\\', '', snake_case(str_plural(class_basename($model))));
        }
        cache()->forget($cacheName);
    }
}

if (! function_exists('form')) {
    function form()
    {
        return app('form');
    }
}

if (! function_exists('cache')) {
    function cache()
    {
        return app('cache');
    }
}