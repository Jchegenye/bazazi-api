<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Http\Reuseable\JsonPrettyStyle;

class UserController extends Controller
{

    use JsonPrettyStyle;

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
            'names' => 'required',
            'email' => 'email|unique:users,email|required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation|unique:users|required',
            'password_confirmation' => 'min:6',
        ];

        $customMessages = [
             'required' => 'Please fill :attribute field!'
        ];
        $this->validate($request, $rules, $customMessages);

        //Try catch handle to handle the response if there is an error while querying the database
        try {

            $hasher = app()->make('hash');
            $names = $request->input('names');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));

            $save = User::create([
                'names'=> $names,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> ''
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration successful!';
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

        if ($user->isEmpty()) {

            return $this->pre(
                array(
                    'status' => false,
                    'message' => "Cannot find user(s)!"
                )
            );

        }else{

            return $this->pre(
                array(
                    'status' => true,
                    'users' => $user
                )
            );

        }

    }

}