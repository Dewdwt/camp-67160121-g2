<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FlightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('html101');
});

Route::get('/views2', function () {
    return view('myviews2');
});

/* ------------------------------
| MyController
|-------------------------------*/
Route::get('/mycontroller', [MyController::class, 'index']);
Route::post('/mycontroller', [MyController::class, 'process']);

/* ------------------------------
| FORM Workshop
|-------------------------------*/
Route::post('/form-result', [FormController::class, 'result'])
    ->name('form.result');

/* ------------------------------
| FlightController (namespace)
|-------------------------------*/
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/flight', 'FlightController@index');
});
