<?php

use Illuminate\Support\Facades\Route;
use App\Sexo;
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
/* Route::get('/', function () {
    return view('welcome');
}); */

//prueba
/*Route::get('/citas', function () {
    return view('DoctoraDental.DashboardDoctoraDental');
});*/

//Rutas de los reportes
Route::resource('reportes', 'ReporteController');
Route::get('reporteCitas', 'ReporteController@reporteCitas')->name('citas.reporteCitas');
Route::get('reporteRecetas', 'ReporteController@reporteRecetas')->name('recetas.reporteRecetas');
Route::get('mostrarExpediente/{paciente}/{expediente}/ReporteDiagnosticoDental', 'ReporteController@reporteDiagnosticoDental')->name('reporteDiagnosticoDental');
Route::get('reporteExamenes', 'ReporteController@reporteExamenes')->name('examene.reporteExamenes');
Route::get('reportePagos', 'ReporteController@reportePagos')->name('pago.reportePagos');

Route::resource('abonos', 'AbonoController');
Route::get('abonos/{abono}/borrar', 'AbonoController@delete')->name('abonos.delete');

//examenes doctor general
Route::resource('examenesGenerales', 'ExameneController');
Route::get('examenesGenerales/{examenesGenerales}/borrar', 'ExameneController@delete')->name('examenesGenerales.delete');

//examenes doctor dental
Route::resource('examenesDentales', 'ExamenesDoctoraDentalController');
Route::get('examenesDentales/{examenesDentale}/borrar', 'ExamenesDoctoraDentalController@delete')->name('examenesDentales.delete');

Route::resource('pagos', 'PagoController');
Route::get('pagos/{pago}/borrar', 'PagoController@delete')->name('pagos.delete');

//cita
Route::resource('citas', 'CitaController');
Route::get('citas/{cita}/borrar', 'CitaController@delete')->name('citas.delete');
Route::post('citas/{urlView}', 'CitaController@store')->name('citas.store');
Route::get('searchPaciente/{name}','CitaController@searchPaciente')->name('citas.searchPaciente');
Route::get('citas/{cita}/finalizada', 'CitaController@finalizada')->name('citas.finalizada');
Route::get('citas/{cita}/finished', 'CitaController@finished')->name('citas.finished');
Route::get('citas/{cita}/cancelada', 'CitaController@cancelada')->name('citas.cancelada');
Route::get('citas/{cita}/cancelled', 'CitaController@cancelled')->name('citas.cancelled');
Route::get('citas/{cita}/programada', 'CitaController@programada')->name('citas.programada');
Route::get('citas/{cita}/programated', 'CitaController@programated')->name('citas.programated');

//citas doctor general
Route::get('/dashboardDoctorGeneral', 'DashboardController@doctorGeneralIndex')->name('dshDoctorGeneral.index');
//citas doctor dental
Route::get('/dashboardDoctorDental', 'DashboardController@doctorDentalIndex')->name('dshDoctorDental.index');
//citas secretaria
Route::get('/dashboardSecretaria', 'DashboardController@secretariaIndex')->name('dshSecretaria.index');
//citas administrador
Route::get('/dashboardAdministrador', 'DashboardController@administradorIndex')->name('dshAdministrador.index');
//Autocomplete

//consulta
Route::resource('consultas', 'ConsultaController');
Route::get('consultas/{consulta}/borrar', 'ConsultaController@delete')->name('consultas.delete');
Route::get('searchPaciente/{name}','ConsultaController@searchPaciente')->name('consultas.searchPaciente');
Route::get('consultas/{consulta}/imprimir', 'ConsultaController@imprimir')->name('consultas.imprimir');
Route::get('consultas/{consulta}/descargar', 'ConsultaController@descargar')->name('consultas.descargar');
//recetas
Route::resource('recetas', 'RecetaController');
Route::get('recetas/{receta}/borrar', 'RecetaController@delete')->name('recetas.delete');
Route::get('recetas/{receta}/imprimir', 'RecetaController@imprimir')->name('recetas.imprimir');
Route::get('recetas/{receta}/descargar', 'RecetaController@descargar')->name('recetas.descargar');

Route::get('/index',function(){
    /*Sexo::firstOrCreate(['nombre'=>'masculino']);
    Sexo::firstOrCreate(['nombre'=>'Femenino']);*/
    return view('Base.prueba');
})->name('index');

Route::get('/forms',function(){
    return view('Prueba.forms');
})->name('forms');
Route::get('/prueba',function(){
    return view('Prueba.prueba');
})->name('prueba');

Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
Route::post('/registro', 'Auth\RegisterController@register')->name('register_post');
//php artisan route:list --name=pacientes
//<------------------------------------------------------------PARA VISUALIZAR RUTAS RESOURCES  ----------------------------------------------------------------------------------------------------------->
//Route::resource('usuarios','UserController');

//Route::resource('pacientes', 'PacienteController');
Route::resource('sexos', 'SexoController');

Route::get('/', 'HomeController@index')->name('home');
//Solo Admin y secretaria
Auth::routes();
Route::middleware(['auth'])->group(function (){

    /******* INICIO RUTAS COMPARTIDAS ********************/
    /******* El único requisito es que este logeado ****/
    Route::resource('pacientes', 'PacienteController');
    Route::get('pacientes/{paciente}/borrar', 'PacienteController@delete')->name('pacientes.delete');
    Route::resource('personas', 'PersonaController');
    Route::get('personas/{persona}/borrar', 'PersonaController@delete')->name('personas.delete');
    Route::resource('rolpersonas', 'RolpersonaController');
    Route::get('rolpersonas/{rolpersona}/borrar', 'RolpersonaController@delete')->name('rolpersonas.delete');
    //CRUD citas (TODOS PUEDEN)  Tomar en cuenta que los dos doctores pueden tener cita a la misma hora pero no el mismo paciente
    //Mostrar las citas del día para los dos doctores

    /******** FIN RUTAS COMPARTIDAS *********************/


    //Rutas asignadas para el Administrador (Admin, Doctor General, Doctora Dental)
    //Todos ellos pueden entrar menos la secretaria
    Route::group(['middleware' => 'AdminMiddleware'],function(){
        Route::get('/admin',function(){
            return view('Prueba.admin');
        })->name('admin');
        Route::resource('usuarios','UserController');
        Route::get('usuarios/{usuario}/borrar', 'UserController@delete')->name('usuarios.delete');
    });

    //Rutas asignadas para el Doctor General (SOLO PARA EL DOCTOR)
    Route::group(['middleware' => 'DoctorGeneralMiddleware'],function(){
        Route::get('/expedientePacienteGeneral/{cita}','ExpedienteDoctorController@index')->name('ExpedientePacienteDoctor');
        Route::post('/crearConsulta','ExpedienteDoctorController@crearConsulta')->name('crearConsulta');
        Route::get('/expedientesGeneral','ExpedienteDoctorController@expedientes')->name('expedientesGeneral');
        Route::get('mostrarExpedienteGeneral/{id}','ExpedienteDoctorController@showExpediente')->name('showExpedienteGeneral');
        Route::get('/eliminarExpedienteGeneral/{id}/borrar','ExpedienteDoctorController@deleteExpediente')->name('deleteExpedienteGeneral');
        Route::delete('destroyExpedienteGeneral/{id}','ExpedienteDoctorController@destroy')->name('destroyExpedienteGeneral');
        Route::get('/crearCitaDoctor/{idPaciente}','ExpedienteDoctorController@crearCitaDoctor')->name('crearCitaDoctor');
        Route::post('storeCitaDoctor/{urlView}','ExpedienteDoctorController@storeCita')->name('storeCitaDoctor');
        Route::get('/expedienteGeneralCrearPaciente', 'ExpedienteDoctorController@createPaciente')->name('expedienteGeneralCrearPaciente');
        Route::post('/expedienteGeneralStorePaciente', 'ExpedienteDoctorController@storePaciente')->name('expedienteGeneralStorePaciente');
        Route::get('/crearRecetaExpedienteGeneral/{idCita}','ExpedienteDoctorController@createReceta')->name('crearRecetaExpedienteGeneral');
        Route::post('/storeRecetaExpedienteGeneral','ExpedienteDoctorController@storeReceta')->name('storeRecetaExpedienteGeneral');
        Route::get('/crearExamenExpedienteGeneral/{idCita}','ExpedienteDoctorController@createExamen')->name('crearExamenExpedienteGeneral');
        Route::post('/storeExamenExpedienteGeneral/{idCita}','ExpedienteDoctorController@storeExamen')->name('storeExamenExpedienteGeneral');
        Route::get('/doctorGeneral',function(){
            return view('Prueba.doctorGeneral');
        })->name('doctorGeneral');
        Route::get('/reporteDiagnosticoGeneral/{idExpedienteGeneral}', 'ReporteController@reporteDiagnosticoGeneral')->name('reporteDiagnosticoGeneral');
        
    });

    //Rutas asignadas para la Doctora Dental (SOLO PARA LA DOCTORA)
    Route::group(['middleware' => 'DoctoraDentalMiddleware'],function(){
        Route::get('/expedientePaciente/{cita}','ExpedienteDoctoraDentalController@index')->name('ExpedientePacienteDoctoraDental');
        Route::post('/crearConsultaD','ExpedienteDoctoraDentalController@crearConsulta')->name('crearConsultaDoctora');
        Route::get('/expedientesDentales','ExpedienteDoctoraDentalController@expedientes')->name('expedientesDentales');
        Route::get('/mostrarExpediente/{id}','ExpedienteDoctoraDentalController@showExpediente')->name('showExpediente');
        Route::get('/eliminarExpedienteDental/{id}/borrar','ExpedienteDoctoraDentalController@deleteExpediente')->name('deleteExpedienteDental');
        Route::delete('destroyExpedienteDental/{id}','ExpedienteDoctoraDentalController@destroy')->name('destroyExpedienteDental');
        Route::get('/crearCitaDoctora/{idPaciente}','ExpedienteDoctoraDentalController@crearCitaDoctora')->name('crearCitaDoctoraDental');
        Route::post('storeCitaDoctora/{urlView}','ExpedienteDoctoraDentalController@storeCita')->name('storeCitaDoctoraDental');
        Route::get('/expedienteDentalCrearPaciente', 'ExpedienteDoctoraDentalController@createPaciente')->name('expedienteDentalCrearPaciente');
        Route::post('/expedienteDentalStorePaciente', 'ExpedienteDoctoraDentalController@storePaciente')->name('expedienteDentalStorePaciente');
        Route::get('/crearRecetaExpedienteDental/{idCita}','ExpedienteDoctoraDentalController@createReceta')->name('crearRecetaExpedienteDental');
        Route::post('/storeRecetaExpedienteDental','ExpedienteDoctoraDentalController@storeReceta')->name('storeRecetaExpedienteDental');


        Route::get('/crearExamenExpedienteDental/{idExpediente}','ExpedienteDoctoraDentalController@createExamen')->name('crearExamenExpedienteDental');
        Route::post('/storeExamenExpedienteDental/{idExpediente}','ExpedienteDoctoraDentalController@storeExamen')->name('storeExamenExpedienteDental');


        Route::resource('rDentales', 'RecetasDentaleController');
        Route::get('rDentales/{receta}/borrar', 'RecetasDentaleController@delete')->name('rDentales.delete');
        Route::get('rDentalesCreateExpediente/{idCita}','RecetasDentaleController@createReceta')->name('rDentalesRecetasExp');
        Route::post('rDentalesPostExpediente/','RecetasDentaleController@storeExpediente')->name('rDentalesRecetasExpPost');
        Route::get('showRecetasPaciente/{idCita}','RecetasDentaleController@showRecetas')->name('showRecetasPaciente');
        Route::get('/doctoraDental',function(){
            return view('Prueba.doctoraDental');
        })->name('doctoraDental');


        Route::get('/createPagoExpedienteDental/{idPaciente}','ExpedienteDoctoraDentalController@createPago')->name('createPagoExpedienteDental');

        Route::post('/storePagoExpedienteDental/{idPaciente}','ExpedienteDoctoraDentalController@storePago')->name('storePagoExpedienteDental');

        Route::get('/createAbonoExpedienteDental/{idPaciente}/{idPago}','ExpedienteDoctoraDentalController@createAbono')->name('createAbonoExpedienteDental');

        Route::post('/storeAbonoExpedienteDental/{idPaciente}/{idPago}','ExpedienteDoctoraDentalController@storeAbono')->name('storeAbonoExpedienteDental');

        Route::get('/editAbonoExpedienteDental/{id}','ExpedienteDoctoraDentalController@editAbono')->name('editAbonoExpedienteDental');

        Route::patch('/updateAbonoExpedienteDental/{abono}','ExpedienteDoctoraDentalController@updateAbono')->name('updateAbonoExpedienteDental');


        Route::get('/showAbonosExpedienteDental/{idPago}','ExpedienteDoctoraDentalController@showAbonos')->name('showAbonosExpedienteDental');

        //Diente - Tratamiento
        Route::get('showDiente/{idDiente}/{fecha}/{idPaciente}','ExpedienteDoctoraDentalController@showDiente')->name('showDiente');
        Route::post('storeTratamiento/{idDiente}/{fecha}','ExpedienteDoctoraDentalController@storeTratamiento')->name('storeTratamiento');
        Route::get('destroyDienteTratamiento/{idTratamiento}','ExpedienteDoctoraDentalController@destroyTratamiento')->name('destroyDienteTratamiento');
        Route::get('editTratamientoDiente/{idPaciente}/{idTratamiento}','ExpedienteDoctoraDentalController@editTratamiento')->name('editTratamiento');
        Route::patch('updateTratamientoDientes/{tratamiento}/{idExpediente}','ExpedienteDoctoraDentalController@updateTratamiento')->name('updateTratamiento');
        Route::get('tratamientosExpediente/{pacienteId}','ExpedienteDoctoraDentalController@tratamientosExpediente')->name('tratamientosExpediente');
        Route::patch('updateTratamientoDiente/{idTratamiento}','ExpedienteDoctoraDentalController@updateTramientoDiente')->name('updateTramientoDiente');

        Route::get('showInfoDiente/{idDiente}/{idPaciente}','ExpedienteDoctoraDentalController@showInfoDiente')->name('showInfoDiente');
        Route::get('showTratamientosExpediente/{pacienteId}','ExpedienteDoctoraDentalController@showTratamientosExpediente')->name('showTratamientosExpediente');
        Route::get('showInfoRecetas/{pacienteId}','ExpedienteDoctoraDentalController@showInfoRecetas')->name('showInfoRecetas');

        Route::get('reporteDiaTratamientos/{ReporteDiario}','ReporteController@reporteDiaTratamientos')->name('reporteDiaTratamientos');
        Route::get('reportePacienteTratamiento/{paciente}/{ReporteTratamiento}','ReporteController@reportePacienteTratamiento')->name('reportePacienteTratamiento');
    });

    //Rutas asignadas para la secretaria (SOLO PARA LA SECRETARIA)
    Route::group(['middleware' => ['SecretariaMiddleware']], function () {
        Route::get('/secretaria',function(){
            return view('Prueba.secretaria');
        })->name('secretaria');
    });
});

