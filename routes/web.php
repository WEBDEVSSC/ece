<?php

use App\Http\Controllers\CitaConsultaExternaController;
use App\Http\Controllers\CitaConsultaExternaEnfermeriaController;
use App\Http\Controllers\CitaConsultaExternaLaboratorioController;
use App\Http\Controllers\CitaConsultaExternaSignosVitalesController;
use App\Http\Controllers\MedicoConsultaExternaController;
use App\Http\Controllers\PersonalUnidadController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UnemeConsultaExternaEnfermeriaController;
use App\Http\Controllers\UnemeEnfermeriaEstructuraOseaController;
use App\Http\Controllers\UnemeEnfermeriaExamenVascularController;
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

Route::get('admin/settings/personal-unidad/personalUnidadCreate', [PersonalUnidadController::class,'personalUnidadCreate'])->name('personalUnidadCreate');

Route::get('admin/settings/personal-unidad/personalUnidadIndex', [PersonalUnidadController::class,'personalUnidadIndex'])->name('personalUnidadIndex');

Route::post('admin/settings/personal-unidad/personalUnidadStore', [PersonalUnidadController::class,'personalUnidadStore'])->name('personalUnidadStore');

Route::get('admin/settings/personal-unidad/personalUnidadEdit/{id}', [PersonalUnidadController::class,'personalUnidadEdit'])->name('personalUnidadEdit');

Route::put('admin/settings/personal-unidad/personalUnidadUpdate/{id}', [PersonalUnidadController::class,'personalUnidadUpdate'])->name('personalUnidadUpdate');

Route::delete('admin/settings/personal-unidad/personalUnidadDestroy/{id}', [PersonalUnidadController::class,'personalUnidadDestroy'])->name('personalUnidadDestroy');

Route::get('admin/settings/personal-unidad/personalUnidadShow/{id}', [PersonalUnidadController::class,'personalUnidadShow'])->name('personalUnidadShow');

Route::get('admin/settings/personal-unidad/vacaciones/indexPersonalUnidadVacacion/{id}', [PersonalUnidadController::class,'indexPersonalUnidadVacacion'])->name('indexPersonalUnidadVacacion');

Route::get('admin/settings/personal-unidad/vacaciones/createPersonalUnidadVacacion/{id}', [PersonalUnidadController::class,'createPersonalUnidadVacacion'])->name('createPersonalUnidadVacacion');

Route::post('admin/settings/personal-unidad/vacaciones/storePersonalUnidadVacacion/{id}', [PersonalUnidadController::class,'storePersonalUnidadVacacion'])->name('storePersonalUnidadVacacion');

Route::delete('admin/settings/personal-unidad/vacaciones/deletePersonalUnidadVacacion/{id}', [PersonalUnidadController::class,'deletePersonalUnidadVacacion'])->name('deletePersonalUnidadVacacion');

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

Route::get('admin/settings/usuarios/createUsuarioPersonalUnidad/{id}', [UsuarioController::class,'createUsuarioPersonalUnidad'])->name('createUsuarioPersonalUnidad');

Route::put('admin/settings/usuarios/updateUsuarioPersonalUnidad/{id}', [UsuarioController::class,'updateUsuarioPersonalUnidad'])->name('updateUsuarioPersonalUnidad');

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

Route::get('admin/recepcion/pacientes/pacientesContactoCreate/{id}', [PacienteController::class,'pacientesContactoCreate'])->name('pacientesContactoCreate');


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

Route::get('admin/recepcion/consulta-externa/calendario-citas-buscar', [CitaConsultaExternaController::class,'CalendarioCitasConsultaExternaSearch'])->name('CalendarioCitasConsultaExternaSearch');

Route::get('admin/recepcion/consulta-externa/calendario-citas-mostrar', [CitaConsultaExternaController::class,'CalendarioCitasConsultaExternaFind'])->name('CalendarioCitasConsultaExternaFind');


/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - MEDICOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/medicos/consulta-externa/mis-citas',[MedicoConsultaExternaController::class, 'medicoMisCitasIndex'])->name('medicoMisCitasIndex');

Route::get('admin/medicos/consulta-externa/citas-unidad',[MedicoConsultaExternaController::class, 'medicoCitasUnidadIndex'])->name('medicoCitasUnidadIndex');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - ENFERMERIA
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/citas-hoy',[CitaConsultaExternaEnfermeriaController::class, 'citasHoyConsultaExternaEnfermeriaIndex'])->name('citasHoyConsultaExternaEnfermeriaIndex');

Route::get('admin/enfermeria/consulta-externa/pdf/primera-vez/{id}',[CitaConsultaExternaEnfermeriaController::class, 'pdfCitaConsultaExternaEnfermeriaPrimeraVez'])->name('pdfCitaConsultaExternaEnfermeriaPrimeraVez');


/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - SIGNOS VITALES
 * 
 * 
 ******************************************************************************************/

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

Route::get('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-show/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaValoracionPodologicaShow'])->name('UnemeEnfermeriaValoracionPodologicaShow');

Route::get('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-create/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaValoracionPodologicaCreate'])->name('UnemeEnfermeriaValoracionPodologicaCreate');

Route::post('admin/enfermeria/consulta-externa/valoracion-podologica/valoracion-podologica-store/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaValoracionPodologicaStore'])->name('UnemeEnfermeriaValoracionPodologicaStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - EXAMEN DE ESTRUCTURA OSEA
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-show/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenEstructuraOseaShow'])->name('UnemeEnfermeriaExamenEstructuraOseaShow');

Route::get('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-create/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenEstructuraOseaCreate'])->name('UnemeEnfermeriaExamenEstructuraOseaCreate');

Route::post('admin/enfermeria/consulta-externa/examen-estructura-osea/examen-estructura-osea-store/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenEstructuraOseaStore'])->name('UnemeEnfermeriaExamenEstructuraOseaStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - EXAMEN VASCULAR
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/examen-vascular-show/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenVascularShow'])->name('UnemeEnfermeriaExamenVascularShow');

Route::get('admin/enfermeria/consulta-externa/examen-vascular-create/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenVascularCreate'])->name('UnemeEnfermeriaExamenVascularCreate');

Route::post('admin/enfermeria/consulta-externa/examen-vascular-store/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenVascularStore'])->name('UnemeEnfermeriaExamenVascularStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - EXAMEN NEUROLOGICO
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/examen-neurologico-show/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenNeurologicoShow'])->name('UnemeEnfermeriaExamenNeurologicoShow');

Route::get('admin/enfermeria/consulta-externa/examen-neurologico-create/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenNeurologicoCreate'])->name('UnemeEnfermeriaExamenNeurologicoCreate');

Route::post('admin/enfermeria/consulta-externa/examen-neurologico-store/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaExamenNeurologicoStore'])->name('UnemeEnfermeriaExamenNeurologicoStore');

/*******************************************************************************************
 * 
 * 
 * MODULO DE CITAS DE CONSULTA EXTERNA - PRESENCIA DOLOR
 * 
 * 
 ******************************************************************************************/

Route::get('admin/enfermeria/consulta-externa/presencia-dolor-show/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaPresenciaDolorShow'])->name('UnemeEnfermeriaPresenciaDolorShow');

Route::get('admin/enfermeria/consulta-externa/presencia-dolor-create/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaPresenciaDolorCreate'])->name('UnemeEnfermeriaPresenciaDolorCreate');

Route::post('admin/enfermeria/consulta-externa/presencia-dolor-store/{id}', [UnemeConsultaExternaEnfermeriaController::class, 'UnemeEnfermeriaPresenciaDolorStore'])->name('PresenciaDolorStore');

/**
 * 
 * 
 * REPORTES
 * 
 * 
 */

Route::get('admin/enfermeria/consulta-externa/reporte-diario/{fecha}', [CitaConsultaExternaController::class, 'UnemeEnfermeriaReporteDiarioPDF'])->name('UnemeEnfermeriaReporteDiarioPDF');

