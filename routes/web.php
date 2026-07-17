<?php

use App\Http\Controllers\MedicoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*******************************************************************************************
 * 
 * 
 * REDIRECCIONAMOS A LOGIN
 * 
 * 
 ******************************************************************************************/

Route::get('/', function () {
    return redirect()->route('login');
});

/*******************************************************************************************
 * 
 * 
 * BLOQUEAMOS RUTAS DE ADMINLTE3 AUTH
 * 
 * 
 ******************************************************************************************/

Auth::routes([
    'register' => false, // Desactiva el registro de nuevos usuarios
    'reset' => false, // Desactiva la recuperación de contraseña
    'verify' => false,   // Desactiva la verificación de email
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/settings/index', [SettingsController::class, 'index'])->name('settings.index');


/*******************************************************************************************
 * 
 * 
 * SETTINGS - MODULO DE MEDICOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/settings/medicos/medicosCreate', [MedicoController::class,'medicosCreate'])->name('medicosCreate');

Route::get('admin/settings/medicos/medicosIndex', [MedicoController::class,'medicosIndex'])->name('medicosIndex');

Route::post('admin/settings/medicos/medicosStore', [MedicoController::class,'medicosStore'])->name('medicosStore');

Route::get('admin/settings/medicos/medicosEdit/{id}', [MedicoController::class,'medicosEdit'])->name('medicosEdit');

Route::put('admin/settings/medicos/medicosUpdate/{id}', [MedicoController::class,'medicosUpdate'])->name('medicosUpdate');

Route::delete('admin/settings/medicos/medicosDestroy/{id}', [MedicoController::class,'medicosDestroy'])->name('medicosDestroy');

Route::get('admin/settings/medicos/medicosShow/{id}', [MedicoController::class,'medicosShow'])->name('medicosShow');

/*******************************************************************************************
 * 
 * 
 * SETTINGS - MODULO DE USUARIOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/settings/usuarios/usuariosCreate', [UsuarioController::class,'usuariosCreate'])->name('usuariosCreate');

Route::get('admin/settings/usuarios/usuariosIndex', [UsuarioController::class,'usuariosIndex'])->name('usuariosIndex');

Route::post('admin/settings/usuarios/usuariosStore', [UsuarioController::class,'usuariosStore'])->name('usuariosStore');

Route::get('admin/settings/usuarios/usuariosEdit/{id}', [UsuarioController::class,'usuariosEdit'])->name('usuariosEdit');

Route::put('admin/settings/usuarios/usuariosUpdate/{id}', [UsuarioController::class,'usuariosUpdate'])->name('usuariosUpdate');

Route::delete('admin/settings/usuarios/usuariosDestroy/{id}', [UsuarioController::class,'usuariosDestroy'])->name('usuariosDestroy');

Route::get('admin/settings/usuarios/usuariosShow/{id}', [UsuarioController::class,'usuariosShow'])->name('usuariosShow');

/*******************************************************************************************
 * 
 * 
 * SETTINGS - MODULO DE ROLES
 * 
 * 
 ******************************************************************************************/

Route::get('admin/settings/roles/rolesIndex', [RolController::class,'rolesIndex'])->name('rolesIndex');

Route::get('admin/settings/roles/rolesCreate', [RolController::class,'rolesCreate'])->name('rolesCreate');

Route::post('admin/settings/roles/rolesStore', [RolController::class,'rolesStore'])->name('rolesStore');

Route::get('admin/settings/roles/rolesEdit/{id}', [RolController::class,'rolesEdit'])->name('rolesEdit');

Route::put('admin/settings/roles/rolesUpdate/{id}', [RolController::class,'rolesUpdate'])->name('rolesUpdate');

Route::delete('admin/settings/roles/rolesDelete/{id}', [RolController::class,'rolesDelete'])->name('rolesDelete');