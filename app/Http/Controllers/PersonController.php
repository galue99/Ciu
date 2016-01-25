<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return User::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        $user = new User;

        $postData = Input::all();

        $messages = [
            'username.required'   => 'Enter a Username',
            'email.required' => 'Enter a Email',
            'password.required'    => 'Enter a Password',
        ];

        $rules = [
            'username'   => 'required|integer|min:1|max:3',
            'email' => 'required|integer|min:1|max:3',
            'password'    => 'required|integer|min:1|max:3',
        ];

        $validator = Validator::make($postData, $rules, $messages);

        if ($validator->fails())
        {
            // send back to the page with the input data and errors
            return Response::json([
                'Error' => [
                    'message'     => $validator->messages(),
                    'status_code' => 200
                ]
            ], 200);
        }else{
            // Do your stuff here.
            // send back to the page with success message

            return Response::json([
                'Success' => [
                    'message'     => 'Record Save Exits',
                    'status_code' => 200
                ]
            ], 200);
        }

        $user->save(Input::all());

        return 'Registration record successfully created with id ' . $registration;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function show($id) {
        return User::find($id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $user = User::find($request->input('id'));

        $user->delete();

        return "User record successfully deleted #" . $request->input('id');
    }
}
