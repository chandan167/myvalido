<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->setPageTitle(config('constant.page_title.admin.dashboard'));
        return view('admin.dashboard');
    }
}
