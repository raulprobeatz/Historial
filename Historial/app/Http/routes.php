<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('log','LogController');
Route::get('logout','LogController@logOut');
Route::resource('documento','empleado\EmpleadoController@subirDocumentos');
Route::resource('licencia','lincenciamedica\LicenciaMedicaController');
Route::post('documento','empleado\EmpleadoController@guardarDocumentos');
Route::resource('servicio','empleado\EmpleadoController@servicio');
Route::resource('grupo','grupoocupacional\GrupoOcupacionalController');
Route::resource('cargarGrupos','grupoocupacional\GrupoOcupacionalController@cargarGrupos');
Route::resource('usuario','usuario\UsuarioController');
Route::resource('admin','admin\AdminController');
Route::resource('empleado','empleado\EmpleadoController');
Route::resource('empleado/filtrar/{dato}/','empleado\EmpleadoController@filtrar');
Route::resource('empleado/perfil/{id}/','empleado\EmpleadoController@perfil');
Route::post('empleado/foto','empleado\EmpleadoController@subirFoto');
Route::resource('antecedentepersonales','antecedentespatologicospersonales\AntecedentesPersonalesController');
Route::resource('antecedentefamiliares','antecedentespatologicosfamiliares\AntecedentesPatologicosFamiliaresController');
Route::resource('experienciaslaborales','experienciaslaborales\ExperienciasLaboralesController');
Route::resource('habitos','habitostoxicos\HabitosToxicosController');
Route::resource('carreras','carreras\CarrerasController');
Route::resource('puestosdetrabajo','puestosdetrabajo\PuestosDeTrabajoController');
Route::resource('factoresderiesgos','factoresderiesgos\FactoresDeRiesgosController');
Route::resource('departamento','departamento\DepartamentoController');
Route::resource('departamento/faltas/{dato}/','departamento\DepartamentoController@faltas');
Route::resource('departamentos/cantidad','departamento\DepartamentoController@cantidad');