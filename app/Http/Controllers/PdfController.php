<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PdfController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index() {
        //$html = \View('pdfs.example1')->render();

        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->download('pdf');
    }

}
