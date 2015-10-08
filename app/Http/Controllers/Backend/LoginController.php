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
        
            return redirect(\Helper::backendName());
        
        }else{
            return redirect()->back()->withMessage('Please check your username or password');
        }
    }

    public function template($password)
    {
        $html = '<html>
                    <head>
                            <title>HTML email</title>
                    </head>
                        <body>
                            <table widht="600px" style="background: #f3f3f3; padding: 20px;" cellpadding="1px" cellspacing="1px">
                                <tr>
                                    <td colspan="2" style = "font-size:16px;padding-bottom:10px;padding-top:10px;"><b>New Password MRT User</b></td>
                                </tr>
                                <tr>
                                    <td width="250px">Your new password</td>
                                    <td>:</td>
                                    <td>'.$password.'</td>
                                </tr>

                                
                            </table>
                            </body>
                </html>';
    }

    public function getForgot()
    {
        $model = \Helper::injectModel('User');
        $email = \Input::get('email');
        $search = $model->select('id')->whereEmail($email)->first();

        if(!empty($search->id))
        {
        
            $newPassword = \Hash::make('webarq'.rand());
            $model->whereEmail($email)->update(['password' => $newPassword]);

            $to = $email;
            $subject = 'MRT - Forgot Password';
            $body = $this->template($email);
            
            // To send HTML mail, the Content-type header must be set
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $send_email = mail($to, $subject, $body, $headers);
            if($send_email)
            {
                echo 'true';
            }
           

            
        }else{
            echo 'false';
        
        }
    }
}
