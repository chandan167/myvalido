<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $this->setPageTitle(config('constant.page_title.home'));
        return view('home');
    }
}
