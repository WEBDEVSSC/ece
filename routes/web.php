<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * 
 * 
 * 
 * 
 * 
 * 
 */
Route::get('admin/medicos/medicosCreate', [MedicoController::class,'medicosCreate'])->name('medicosCreate');

Route::get('admin/medicos/medicosIndex', [MedicoController::class,'medicosIndex'])->name('medicosIndex');

Route::post('admin/medicos/medicosStore', [MedicoController::class,'medicosStore'])->name('medicosStore');