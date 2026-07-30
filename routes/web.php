<?php

use App\Http\Controllers\CitaConsultaExternaController;
use App\Http\Controllers\CitaConsultaExternaEnfermeriaController;
use App\Http\Controllers\CitaConsultaExternaLaboratorioController;
use App\Http\Controllers\CitaConsultaExternaSignosVitalesController;
use App\Http\Controllers\MedicoConsultaExternaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UnemeEnfermeriaEstructuraOseaController;
use App\Http\Controllers\UnemeEnfermeriaValoracionPodologicaController;
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

Route::get('admin/settings/medicos/vacaciones/indexMedicosVacacion/{id}', [MedicoController::class,'indexMedicosVacacion'])->name('indexMedicosVacacion');

Route::get('admin/settings/medicos/vacaciones/createMedicosVacacion/{id}', [MedicoController::class,'createMedicosVacacion'])->name('createMedicosVacacion');

Route::post('admin/settings/medicos/vacaciones/storeMedicosVacacion/{id}', [MedicoController::class,'storeMedicosVacacion'])->name('storeMedicosVacacion');

Route::delete('admin/settings/medicos/vacaciones/deleteMedicosVacacion/{id}', [MedicoController::class,'deleteMedicosVacacion'])->name('deleteMedicosVacacion');

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

Route::get('admin/settings/usuarios/createUsuarioMedico/{id}', [UsuarioController::class,'createUsuarioMedico'])->name('createUsuarioMedico');

Route::put('admin/settings/usuarios/updateUsuarioMedico/{id}', [UsuarioController::class,'updateUsuarioMedico'])->name('updateUsuarioMedico');

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

/*******************************************************************************************
 * 
 * 
 * MODULO DE RECEPCION DE PACIENTES
 * 
 * 
 ******************************************************************************************/

Route::get('admin/recepcion/pacientes/pacientesFind', [PacienteController::class,'pacientesFind'])->name('pacientesFind');

Route::get('admin/recepcion/pacientes/pacientesSearch', [PacienteController::class,'pacientesSearch'])->name('pacientesSearch');

Route::get('admin/recepcion/pacientes/pacientesCreate', [PacienteController::class,'pacientesCreate'])->name('pacientesCreate');

Route::post('admin/recepcion/pacientes/pacientesStore', [PacienteController::class,'pacientesStore'])->name('pacientesStore');

Route::get('admin/recepcion/pacientes/pacientesIndex', [PacienteController::class,'pacientesIndex'])->name('pacientesIndex');

Route::get('admin/recepcion/pacientes/pacientesEdit/{id}', [PacienteController::class,'pacientesEdit'])->name('pacientesEdit');

Route::put('admin/recepcion/pacientes/pacientesUpdate/{id}', [PacienteController::class,'pacientesUpdate'])->name('pacientesUpdate');


Route::get('admin/recepcion/pacientes/pacientesNoExpedienteCreate/{id}', [PacienteController::class,'pacientesNoExpedienteCreate'])->name('pacientesNoExpedienteCreate');

Route::put('admin/recepcion/pacientes/pacientesNoExpedienteStore/{id}', [PacienteController::class,'pacientesNoExpedienteStore'])->name('pacientesNoExpedienteStore');


Route::get('admin/recepcion/pacientes/pacientesDXMedicoCreate/{id}', [PacienteController::class,'pacientesDXMedicoCreate'])->name('pacientesDXMedicoCreate');

Route::put('admin/recepcion/pacientes/pacientesDXMedicoStore/{id}', [PacienteController::class,'pacientesDXMedicoStore'])->name('pacientesDXMedicoStore');


Route::get('admin/recepcion/pacientes/pacientesShow/{id}', [PacienteController::class,'pacientesShow'])->name('pacientesShow');

Route::get('admin/recepcion/pacientes/pacientesResumenMedico/{id}', [PacienteController::class,'pacientesResumenMedico'])->name('pacientesResumenMedico');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - RECEPCION
 * 
 * 
 ******************************************************************************************/

Route::get('admin/recepcion/consulta-externa/citas-buscar', [CitaConsultaExternaController::class,'citasConsultaExternaSearch'])->name('citasConsultaExternaSearch');

Route::get('admin/recepcion/consulta-externa/citas-mostrar', [CitaConsultaExternaController::class,'citasConsultaExternaFind'])->name('citasConsultaExternaFind');

Route::post('admin/recepcion/consulta-externa/citas-store', [CitaConsultaExternaController::class,'citasConsultaExternaStore'])->name('citasConsultaExternaStore');

Route::delete('admin/recepcion/consulta-externa/citas-delete/{id}', [CitaConsultaExternaController::class,'citasConsultaExternaDelete'])->name('citasConsultaExternaDelete');

Route::get('admin/recepcion/consulta-externa/citas-show/{id}', [CitaConsultaExternaController::class,'citasConsultaExternaShow'])->name('citasConsultaExternaShow');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - MEDICOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/medicos/consulta-externa/mis-citas',[MedicoConsultaExternaController::class, 'medicoMisCitasIndex'])->name('medicoMisCitasIndex');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - ENFERMERIA
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/citas-hoy',[CitaConsultaExternaEnfermeriaController::class, 'citasHoyConsultaExternaEnfermeriaIndex'])->name('citasHoyConsultaExternaEnfermeriaIndex');


/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - ENFERMERIA
 * 
 * 
 ******************************************************************************************/

//Route::get('admin/enfermeria/consulta-externa/citas-hoy', [CitaConsultaExternaSignosVitalesController::class, 'SignosVitalesConsultaExternaIndex'])->name('SignosVitalesConsultaExternaIndex');

Route::get('admin/enfermeria/consulta-externa/signos-vitales-show/{id}', [CitaConsultaExternaSignosVitalesController::class, 'SignosVitalesShow'])->name('SignosVitalesShow');

Route::get('admin/enfermeria/consulta-externa/signos-vitales-create/{id}', [CitaConsultaExternaSignosVitalesController::class, 'SignosVitalesCreate'])->name('SignosVitalesCreate');

Route::post('admin/enfermeria/consulta-externa/signos-vitales-store/{id}', [CitaConsultaExternaSignosVitalesController::class, 'SignosVitalesStore'])->name('SignosVitalesStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - LABORATORIOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/laboratorios/citas-hoy', [CitaConsultaExternaLaboratorioController::class, 'ConsultaExternaLaboratorioIndex'])->name('ConsultaExternaLaboratorioIndex');

Route::get('admin/enfermeria/consulta-externa/laboratorios/laboratorios-show/{id}', [CitaConsultaExternaLaboratorioController::class, 'ConsultaExternaLaboratorioShow'])->name('ConsultaExternaLaboratorioShow');

Route::get('admin/enfermeria/consulta-externa/laboratorios/laboratorios-create/{id}', [CitaConsultaExternaLaboratorioController::class, 'ConsultaExternaLaboratorioCreate'])->name('ConsultaExternaLaboratorioCreate');

Route::post('admin/enfermeria/consulta-externa/laboratorios/laboratorios-store/{id}', [CitaConsultaExternaLaboratorioController::class, 'ConsultaExternaLaboratorioStore'])->name('ConsultaExternaLaboratorioStore');

/*******************************************************************************************
 * 
 * 
 * UNEMES - ENFERMERIA - VALORACION PODOLOGICA
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/valoracion-podologica/citas-hoy', [UnemeEnfermeriaValoracionPodologicaController::class, 'UnemeEnfermeriaValoracionPodologicaIndex'])->name('UnemeEnfermeriaValoracionPodologicaIndex');

Route::get('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-show/{id}', [UnemeEnfermeriaValoracionPodologicaController::class, 'UnemeEnfermeriaValoracionPodologicaShow'])->name('UnemeEnfermeriaValoracionPodologicaShow');

Route::get('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-create/{id}', [UnemeEnfermeriaValoracionPodologicaController::class, 'UnemeEnfermeriaValoracionPodologicaCreate'])->name('UnemeEnfermeriaValoracionPodologicaCreate');

Route::post('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-store/{id}', [UnemeEnfermeriaValoracionPodologicaController::class, 'UnemeEnfermeriaValoracionPodologicaStore'])->name('UnemeEnfermeriaValoracionPodologicaStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - EXAMEN DE ESTRUCTURA OSEA
 * 
 * 
 ******************************************************************************************/

//Route::get('admin/enfermeria/consulta-externa/examen-estructura-osea/citas-hoy', [UnemeEnfermeriaEstructuraOseaController::class, 'ConsultaExternaLaboratorioIndex'])->name('ConsultaExternaLaboratorioIndex');

Route::get('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-show/{id}', [UnemeEnfermeriaEstructuraOseaController::class, 'UnemeEnfermeriaExamenEstructuraOseaShow'])->name('UnemeEnfermeriaExamenEstructuraOseaShow');

Route::get('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-create/{id}', [UnemeEnfermeriaEstructuraOseaController::class, 'UnemeEnfermeriaExamenEstructuraOseaCreate'])->name('UnemeEnfermeriaExamenEstructuraOseaCreate');

Route::post('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-store/{id}', [UnemeEnfermeriaEstructuraOseaController::class, 'UnemeEnfermeriaExamenEstructuraOseaStore'])->name('UnemeEnfermeriaExamenEstructuraOseaStore');



