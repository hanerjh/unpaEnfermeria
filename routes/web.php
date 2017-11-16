<?php

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
    return view('consulta');
});

Route::get('detalle/{id}',function($id){
  $num=(string) $id;
   // $servicio= DB::select('select idpersona,detalle_servicio,fecha,codigo_estudiante,concat(nombre," ",apellidos) as nombre,nom_servicio,email from servicio,persona,tipo_servicio where  idpersona=fk_serv_idpersona and idtipo_servicio=fk_tiposervicio and idpersona=?',$num); 
    
  
    $servicio= DB::table('persona')
    ->select(DB::raw('idpersona,detalle_servicio,fecha,codigo_estudiante,concat(nombre," ",apellidos) as nombre,nom_servicio,email'))
    ->join('servicio', 'persona.idpersona', '=', 'servicio.fk_serv_idpersona')
    ->join('tipo_servicio', 'tipo_servicio.idtipo_servicio', '=', 'servicio.fk_tiposervicio')
    ->where('idpersona', '=', $num)
    ->get();
    
    return view('detalle',compact('servicio'));
    //return $id;
});


Route::resource('/servicio','sevicioController');
Route::resource('/regpersona','registroPersona');