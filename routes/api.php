<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('personaRest',function(){
   // $acad= DB::select('select * from prog_academico'); 
   $acad= DB::select('select idpersona,documento,CONCAT(nombre," ", apellidos) as Nomcompleto from persona'); 
    return json_encode($acad);
});

Route::get('apiserviciosmedicos',function(){
    // $acad= DB::select('select * from prog_academico'); 
    $servicio= DB::select('select fecha,codigo_estudiante,concat(nombre," ",apellidos) as nombre,nom_servicio,email from servicio,persona,tipo_servicio where  idpersona=fk_serv_idpersona and idtipo_servicio=fk_tiposervicio'); 
     return json_encode($servicio);
 });