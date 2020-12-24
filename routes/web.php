<?php

use Illuminate\Support\Facades\Route;
// for POST request
use Illuminate\Http\Request;

// custom Controller
use App\Http\Controllers\TouchpointController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// editing
Route::get('/', function () {
    $touchpoints = \App\Models\Touchpoint::all();

    return view('welcome', ['touchpoints' => $touchpoints]);
});

Route::get('/touchpoint', [TouchpointController::class, 'list']);
Route::get('/touchpoint/create', [TouchpointController::class, 'create']);
Route::post('/touchpoint/create', [TouchpointController::class, 'create']);
Route::get('/touchpoint/{id}', [TouchpointController::class, 'show']);
Route::get('/touchpoint/{id}/edit', [TouchpointController::class, 'edit']);
Route::post('/touchpoint/{id}/edit', [TouchpointController::class, 'edit']);
