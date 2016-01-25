<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ParticipantController extends Controller
{
    public function store(Request $request) {

        $user = new User;

        $data = Input::all();
        var_dump($data);


    }
}
