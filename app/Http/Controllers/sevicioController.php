<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class sevicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prog_acad= DB::select('select * from prog_academico');    
        $regimen=DB::select('select * from regime');   
        $tiposerv=DB::select('select * from tipo_servicio');
        $servicio= DB::select('select idpersona,detalle_servicio,fecha,codigo_estudiante,concat(nombre," ",apellidos) as nombre,nom_servicio,email from servicio,persona,tipo_servicio where  idpersona=fk_serv_idpersona and idtipo_servicio=fk_tiposervicio'); 
        
        return view('servicio',compact('prog_acad','regimen','tiposerv','servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data=date('Y-m-d H:i:s');
      /*  $data=now();
       */
       $idpersona= DB::table('servicio')->insert(
        ['detalle_servicio' =>$request->input("observacion"),            
         'fecha'=>$data,
         'fk_tiposervicio' =>$request->input('tiposervicio'),
         'fk_serv_idpersona' =>$request->input("idpersona")]);
            
        return  back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
