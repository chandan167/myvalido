<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Services\Contract\UserService as ContractUserService;


class UserService extends BaseService implements ContractUserService{
    public Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function creater(array $values){
        if(isset($values['profile_image'])){
            $values['profile_image'] = $this->uploadProfileImage();
        }
        if(isset($values['password'])){
            $values['password'] = $this->passwordHash($values['password']);
        }
        return $values;
    }

    public function uploadProfileImage(){
        return request()->file('profile_image')->store('user_image', config('constant.storage_disk'));
    }

    public function passwordHash($password){
       return  Hash::make($password);
    }
}
