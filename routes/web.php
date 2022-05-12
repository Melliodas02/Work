<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VebinarsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vebinars/add', [VebinarsController::class, 'add']);
Route::post('/vebinars/submit-add', [VebinarsController::class, 'add_submit']);
Route::get('vebinars', [VebinarsController::class, 'vebinar_list']);
Route::get('vebinars/{id}', [VebinarsController::class, 'vebinar_info']);
Route::get('/vebinars/{id}/add_docs', [VebinarsController::class, 'add_docs']);
Route::post('/vebinars/{id}/submit_add_docs', [VebinarsController::class, 'add_docs_submit']);
Route::get('vebinars/{id}/add_date', [VebinarsController::class, 'add_date']);
Route::post('vebinars/{id}/add_date_submit', [VebinarsController::class, 'add_date_submit']);
