<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Registration::orderBy('id', 'asc')->get();
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

        $registration = new Registration;

        $postData = Input::all();

        $messages = [
            'program.required'   => 'Enter Program',
            'specialty.required' => 'Enter Specialty',
            'period.required'    => 'Enter Period',
            'user_id.required'   => 'Enter User Id',
        ];

        $rules = [
            'program'   => 'required|integer|min:1|max:3',
            'specialty' => 'required|integer|min:1|max:3',
            'period'    => 'required|integer|min:1|max:3',
            'user_id'   => 'required|integer|min:1',
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

        $registration->save(Input::all());

        return 'Registration record successfully created with id ' . $registration;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Registration::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {

        $registration = Registration::find($id);

        $postData = Input::all();

        $messages = [
            'program.required'   => 'Enter Program',
            'specialty.required' => 'Enter Specialty',
            'period.required'    => 'Enter Period',
            'user_id.required'   => 'Enter User Id',
        ];

        $rules = [
            'program'   => 'required|integer|min:1|max:3',
            'specialty' => 'required|integer|min:1|max:3',
            'period'    => 'required|integer|min:1|max:3',
            'user_id'   => 'required|integer|min:1',
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

        $registration->save(Input::all());

        return "Sucess updating user #" . $registration->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $user = Information::find($request->input('id'));

        $user->delete();

        return "User record successfully deleted #" . $request->input('id');
    }
}
