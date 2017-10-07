<?php

namespace App\Http\Middleware;

use Closure;
use App\Language;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Admin
{
    protected $auth;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }


    public function handle($request, Closure $next)
    {
        $languages = Language::get();
        $this->view->share('languages', $languages);
        return $next($request);
    }
}
