<?php

namespace App\Support;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Paginator extends \Illuminate\Pagination\Paginator
{
    public function url($page)
    {
        return URL::toRoute(
            Request::route(),
            [
                ...Request::route()->parameters(),
                'page' => $page > 1 ? $page : null,
            ],
            false
        );
    }
}
