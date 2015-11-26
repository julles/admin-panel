<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getIndex()
    {
        return view('backend.login');
    }

    public function postIndex(Request $request)
    {
        if(\Auth::attempt(['name' => $request->username , 'password' => $request->password]))
        {
            \Helper::history('Login' , '' , []);
            return redirect(\Helper::backendName());
        
        }else{
            return redirect()->back()->withMessage('Please check your username or password');
        }
    }
    
    public function getForgot()
    {
        $model = \Helper::injectModel('User');
        $email = \Input::get('email');
        $search = $model->select('id')->whereEmail($email)->first();

        if(!empty($search->id))
        {
            $randomPassword = 'webarq'.rand();
            $newPassword = \Hash::make($randomPassword);

            \Mail::send('email.forgot', ['email' => $search , 'randomPassword' => $randomPassword], function ($m) use ($search , $email) {
                $m->from('no-reply@webarq.co.id');
                $m->to($email)->subject('Forgot Password');
            });
            
            $update = $model->whereEmail($email)->update(['password' => $newPassword]);

            echo 'true';

        }else{
            echo 'false';
        
        }
    }
}
