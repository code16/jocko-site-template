<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.home', [
            'page' => Page::firstWhere('key', 'home'),
        ]);
    }
}
