<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;

class UserController extends Controller
{

    /**
     * Register a new user.
     *
     * @author Jackson A. Chegenye
     * @return json
     */
    public function register(Request $request)
    {
        //Before the new user is created, Lumen will validate the parameters needed to register the new user.
        $rules = [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);

        //Try catch handle to handle the response if there is an error while querying the database
        try {
            $hasher = app()->make('hash');
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));

            $save = User::create([
                'username'=> $username,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> ''
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration success!';
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    /**
     * Fetch all Users available.
     *
     * @author Jackson A. Chegenye
     * @return json
     */
    public function get_user()
    {
        $user = User::all();
        if ($user) {
            $res['status'] = true;
            $res['message'] = $user;

            return response($res);
        }else{
            $res['status'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res);
        }
    }
}