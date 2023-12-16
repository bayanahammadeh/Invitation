<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('invitation', [App\Http\Controllers\InvitationController::class, 'index']);
Route::get('all', [App\Http\Controllers\InvitationController::class, 'all']);
Route::get('fetch-all', [App\Http\Controllers\InvitationController::class, 'fetch_all']);
Route::get('external', [App\Http\Controllers\InvitationController::class, 'external']);
Route::get('fetch', [App\Http\Controllers\InvitationController::class, 'fetch']);
Route::get('fetch-external', [App\Http\Controllers\InvitationController::class, 'fetch_external']);
Route::post('add-invitation', [App\Http\Controllers\InvitationController::class, 'store']);
Route::get('confirm/{id}', [App\Http\Controllers\InvitationController::class, 'edit']);
Route::get('edit-order/{id}', [App\Http\Controllers\InvitationController::class, 'edit_order']);
Route::post('update-status/{id}', [App\Http\Controllers\InvitationController::class, 'update_status']);
Route::post('update-chair/{id}', [App\Http\Controllers\InvitationController::class, 'update_chair']);
Route::get('form', [App\Http\Controllers\InvitationController::class, 'form']);
Route::post('add-form', [App\Http\Controllers\InvitationController::class, 'store_form']);
Route::post('update/{id}', [App\Http\Controllers\InvitationController::class, 'update']);



Route::post('chair-condition/{id}', [App\Http\Controllers\ChairController::class, 'chair_condition']);

Route::get('send/{email}', [App\Http\Controllers\MailController::class, 'index']);

