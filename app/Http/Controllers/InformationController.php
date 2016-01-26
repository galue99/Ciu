<?php

namespace App\Http\Controllers;
use App\Information;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Information::orderBy('id', 'asc')->get();
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

        $information = new Information;

        $postData = Input::all();

        $messages = [
            'name.required'                    => 'Enter Name',
            'lastname.required'                => 'Enter Lastname',
            'dni.required'                     => 'Enter Dni',
            'genere.required'                  => 'Enter Genere',
            'address.required'                 => 'Enter Address',
            'country.required'                 => 'Enter Country',
            'state.required'                   => 'Enter State',
            'city.required'                    => 'Enter City',
            'phone.required'                   => 'Enter Phone',
            'cellphone.required'               => 'Enter Cellphone',
            'country_s.required'               => 'Enter Country Study',
            'state_s.required'                 => 'Enter State Study',
            'city_s.required'                  => 'Enter City Study',
            'training_area.required'           => 'Enter Training Area',
            'specialty.required'               => 'Enter Specialty',
            'academy_degree_obtained.required' => 'Enter Academy Degree Obtained',
            'senior_year.required'             => 'Enter Senior Year',
            'user_id.required'                 => 'Enter User Id',
        ];

        $rules = [
            'name'                    => 'required',
            'lastname'                => 'required',
            'dni'                     => 'required|numeric|unique:informations',
            'genere'                  => 'required',
            'address'                 => 'required',
            'country'                 => 'required|integer|min:1|max:3',
            'state'                   => 'required|integer|min:1|max:3',
            'city'                    => 'required|integer|min:1|max:3',
            'phone'                   => 'required|integer',
            'cellphone'               => 'required|integer',
            'country_s'               => 'required|integer|min:1|max:3',
            'state_s'                 => 'required|integer|min:1|max:3',
            'city_s'                  => 'required|integer|min:1|max:3',
            'training_area'           => 'required',
            'specialty'               => 'required|integer|max:3',
            'academy_degree_obtained' => 'required|integer|min:1|max:3',
            'senior_year'             => 'required|integer|min:1|max:3',
            'user_id'                 => 'required|integer|min:1',
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

            $information->name                    = $request->input('name');
            $information->lastname                = $request->input('lastname');
            $information->dni                     = $request->input('dni');
            $information->genere                  = $request->input('genere');
            $information->address                 = $request->input('address');
            $information->country                 = $request->input('country');
            $information->state                   = $request->input('state');
            $information->city                    = $request->input('city');
            $information->phone                   = $request->input('phone');
            $information->cellphone               = $request->input('cellphone');
            $information->country_s               = $request->input('country_s');
            $information->state_s                 = $request->input('state_s');
            $information->training_area           = $request->input('training_area');
            $information->specialty               = $request->input('specialty');
            $information->academy_degree_obtained = $request->input('academy_degree_obtained');
            $information->senior_year             = $request->input('senior_year');
            $information->user_id                 = $request->input('user_id');
            $information->save();

            return Response::json([
                'Success' => [
                    'message'     => 'Record Save Exits',
                    'status_code' => 200
                ]
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Information::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $user = Information::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->position = $request->input('position');
        $user->save();

        return "Sucess updating user #" . $user->id;
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
