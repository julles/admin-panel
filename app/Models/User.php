<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $guarded = [];

    public function rules($id = "")
    {

        if(!empty($id))
        {
            $email = 'required|email|unique:users,email,'.$id;
            $username = 'required|unique:users,name,'.$id;
        }else{
            $email = 'required|email|unique:users';
            $username = 'required|unique:users';
        }

        return [
            'role_id' => 'required',
            'email' => $email,
            'name' => $username , 
            'password' => 'required|min:4',
            'verify_password' => 'required|min:4|same:password',
            'firstname' => 'required',
            'phone' => 'numeric',

        ];
    }
}
