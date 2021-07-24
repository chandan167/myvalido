<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->setPageTitle(config('constant.page_title.admin.user.list'));
        return view('admin.user.list');
    }
}
