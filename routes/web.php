<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PokedexController;

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

/* ------------------------------
| PokedexController (Resourceful Routes)
|-------------------------------*/
Route::resource('pokedex', PokedexController::class);

/* ------------------------------
| หรือจะกำหนดแต่ละเมทอดแยกก็ได้แบบนี้
|-------------------------------*/
// Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex.index');
// Route::get('/pokedex/create', [PokedexController::class, 'create'])->name('pokedex.create');
// Route::post('/pokedex', [PokedexController::class, 'store'])->name('pokedex.store');
// Route::get('/pokedex/{pokedex}', [PokedexController::class, 'show'])->name('pokedex.show');
// Route::get('/pokedex/{pokedex}/edit', [PokedexController::class, 'edit'])->name('pokedex.edit');
// Route::put('/pokedex/{pokedex}', [PokedexController::class, 'update'])->name('pokedex.update');
// Route::delete('/pokedex/{pokedex}', [PokedexController::class, 'destroy'])->name('pokedex.destroy');

/* ------------------------------
| ถ้าต้องการให้หน้าแรกเป็นระบบ Pokedex
|-------------------------------*/
// Route::get('/', [PokedexController::class, 'index'])->name('pokedex.index');

/* ------------------------------
| Route สำหรับหน้าแรกแบบเดิม แต่มีลิงก์ไปยัง Pokedex
|-------------------------------*/
Route::get('/', function () {
    return view('html101', ['has_pokedex' => true]);
});

/* ------------------------------
| Route สำหรับทดสอบ Pokedex
|-------------------------------*/
Route::get('/test-pokedex', function () {
    return redirect()->route('pokedex.index');
});
