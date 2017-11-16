
@extends('layout.admin')

@section('content')

<div class="col-md-12">
  <h1>DETALLES</h1>


<dl class="row">
  @foreach($servicio as $serv )
  
    <dt class="col-sm-3">Fecha</dt>
  <dd class="col-sm-9">{{$serv->fecha}} </dd>

  <dt class="col-sm-3">Nombre</dt>
  <dd class="col-sm-9">
    <p>{{$serv->nombre}}</p>
  </dd>
<dt class="col-sm-3">Codigo</dt>
  <dd class="col-sm-9">{{ $serv->codigo_estudiante }}.</dd>

  <dt class="col-sm-3">Tipo de Servicio</dt>
  <dd class="col-sm-9">{{$serv->nom_servicio }}</dd>

  <dt class="col-sm-3 text-truncate">Descripcion</dt>
  <dd class="col-sm-9">{{$serv->detalle_servicio }}</dd>

  <dt class="col-sm-3">Nesting</dt>
  <dd class="col-sm-9">
    <dl class="row">
      <dt class="col-sm-4">Nested definition list</dt>
      <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
    </dl>
  </dd>
</dl>

   @endforeach  
  

</div>


  

   
@endsection

