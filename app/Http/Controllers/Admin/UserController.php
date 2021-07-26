<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\AddUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $this->setPageTitle(config('constant.page_title.admin.user.list'));
        return view('admin.user.list');
    }

    public function showAddPage()
    {
        $this->setPageTitle(config('constant.page_title.admin.user.add'));
        return view('admin.user.add');
    }

    public function add(AddUserRequest $request)
    {
        $validated = $request->validated();
        $this->userService->create($validated);
        return redirect()->back();
    }
}
