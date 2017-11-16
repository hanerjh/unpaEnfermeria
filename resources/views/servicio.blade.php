
@extends('layout.admin')

@section('content')
    <h1>Pagina de servicios</h1>
<div class="col-md-7">
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Servicios Ofrecidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="external_filter_container">Filtrar por fecha: </div><br>
              <table id="example1" class="table table-condensed table-striped" class="display" cellspacing="0" width="100%">
                <thead >
                <tr>
                  <th>Fecha</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Servicio</th>                 
                  <th>email</th>
                  <th>Detalle </th>
                </tr>
                </thead>
                 <tbody>
                  @foreach($servicio as $serv )
                    <tr>
                        <td>{{$serv->fecha}}</td>
                        <td>{{$serv->codigo_estudiante}}</td>
                        <td>{{$serv->nombre}}</td>
                        <td>{{$serv->nom_servicio}}</td>
                        <td>{{$serv->email}}</td>
                        <td><a href="{{ url('detalle', ['id' =>$serv->idpersona]) }}">ver</a></td>
                    </tr>
                  @endforeach  
                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>

<div class="col-md-5">
  <div class="box box-primary">
    <div class="box-header with-border">   
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="/servicio">
    {{csrf_field()}}
      <div class="box-body">
       <!-- cuando ingresemos el documento, el sistemas debe buscar el estudiante, sino debe
       sacar un modal form para registrarlo -->   

        <!-- Button trigger modal -->
        

         <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" name="tiposervicio" id="exampleFormControlSelect1">
                  @foreach($tiposerv as $tpservicio  )
                <option value="{{$tpservicio->idtipo_servicio}}">{{ $tpservicio->nom_servicio }}</option>
              @endforeach         
            </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Documento/código</label>
          <input type="text" v-model="input" v-on:keyup="activar()"  class="form-control" id="exampleInputEmail1" placeholder="Ingrese documento o código de estudiante">
          <input type="hidden" v-model="keyidpersona" name="idpersona">
        </div>
        <div class="list-group" v-if="activo!=false">
           <template v-for="dat in filterBy(dats,input.trim())"  v-if="input.trim()">
           <a href="#" v-on:click="buscarPersona(dat)"  class="list-group-item list-group-item-action list-group-item-light"  v-text="dat.Nomcompleto+dat.idpersona"></a>
        
          </template>
           <list-persona></list-persona>
      </div>          
        <div class="form-group" >
          <label for="exampleInputPassword1">Observaciones</label>
          <textarea class="form-control" name="observacion" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      <div class="box-footer">
        <!--<button type="submit" @click.prevent="enviarFormulario()" class="btn btn-primary">Submit</button>-->
        <button type="submit"  class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</div>

<!-- puede ir ña seccion de tabla aqui debajo-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <h2 class="modal-title" id="exampleModalLabel">Registro de personal</h2>        
      </div>

    
        <form method="POST" action="/regpersona">
              {{ csrf_field() }}
        <div class="form-row">   
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">Nombre</label>     
            <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="Nombre">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="inputPassword4" placeholder="Apellido">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">Telefono</label>
            <input type="phone" class="form-control" name="tel" id="inputEmail4" placeholder="Telefono">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Email">
          </div>
        </div>

      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState" class="col-form-label">Programa Académico</label>
            <select id="inputState" name="prog" class="form-control">

              @foreach($prog_acad as $programas  )
                <option value="{{$programas->idprog}}">{{ $programas->nomb_prog }}</option>
              @endforeach

            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState" class="col-form-label">Regimen</label>
            <select id="inputState" name="regimen" class="form-control">

              @foreach($regimen as $reg  )
                <option value="{{$reg->idregime}}">{{ $reg->nom_regimen }}</option>
              @endforeach

            </select>
        </div>
      </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity" name="codigo" class="col-form-label">Codigo</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
        
            <div class="form-group col-md-4">
              <label for="inputZip"  class="col-form-label">Documento de Identidad</label>
              <input type="text" name="docu" class="form-control" id="inputZip">
            </div>

          <div class="form-group col-md-4">
            <label for="inputZip" class="col-form-label">Jornada</label>
            <select id="inputState" name="jornada" class="form-control">
              <option value="D">Diurna</option>
              <option value="N">Nocturna</option>
            </select>
          </div>
        </div> 
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>       
      </form>


    
    </div>
  </div>
</div>


@endsection