<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
});


/*
Route::group(array('before' => 'auth'), function()
{*/
    Route::get('/api/v1/user/', 'PersonController@index');
    Route::post('/api/v1/user/', 'PersonController@store');
    Route::post('/api/v1/user/{id}', 'PersonController@update');
    Route::delete('/api/v1/user/{id}', 'PersonController@destroy');
    Route::get('/api/v1/person/', 'PersonController@index');
    Route::post('/api/v1/person/', 'PersonController@store');
    Route::post('/api/v1/person/{id}', 'PersonController@update');
    Route::delete('/api/v1/person/{id}', 'PersonController@destroy');
    Route::get('/api/v1/information/{id?}', 'InformationController@index');
    Route::post('/api/v1/information', 'InformationController@store');
    Route::post('/api/v1/information/{id}', 'InformationController@update');
    Route::delete('/api/v1/information/{id}', 'InformationController@destroy');
    Route::get('/api/v1/registration/{id?}', 'RegistrationController@index');
    Route::post('/api/v1/registration', 'RegistrationController@store');
    Route::post('/api/v1/registration/{id}', 'RegistrationController@update');
    Route::delete('/api/v1/registration/{id}', 'RegistrationController@destroy');
    Route::get('/api/v1/pdf', 'PdfController@index');
/*
});
*/
