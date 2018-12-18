<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * For Lumen validation to return the json 
     * response format, we will inject the buildFailedValidationResponse function.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return response(["success"=> false , "message" => $errors],401);
    }
}
