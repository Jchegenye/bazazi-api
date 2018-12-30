<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{

    /**
     * Login users.
     *
     * @author Jackson A. Chegenye
     * @return json
     */
    public function login(Request $request)
    {

      $rules = [
          'email' => 'required',
          'password' => 'required'
      ];

        $customMessages = [
           'required' => ':attribute field is empty.'
      ];
        $this->validate($request, $rules, $customMessages);
         $email    = $request->input('email');
        try {
            $login = User::where('email', $email)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if (Hash::check($request->input('password'), $login->password)) {
                        try {
                            
                                $api_token = sha1($login->user_id.time());
                                $create_token = User::where('user_id', $login->user_id)->update(['api_token' => $api_token]);

                                $res['status'] = true;
                                $res['message'] = 'Success login';
                                $res['data'] =  $login;
                                $res['api_token'] =  $create_token;

                                return response($res, 200);


                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    } else {
                        $res['success'] = false;
                        $res['message'] = 'Username | email | password not found';
                        return response($res, 401);
                    }
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Username | email | password  not found';
                    return response($res, 401);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Username | email | password not found';
                return response($res, 401);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
}