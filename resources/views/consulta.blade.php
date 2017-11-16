
@extends('layout.admin')

@section('content')



<div class="col-md-6">
    <div class="form-group">
        <label for="exampleInputEmail1">Documento/código</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese documento o código estudiantil">
      </div>

  <div class="box box-primary">
    <div class="box-header with-border">
      
      
        <h3> HANER JOHAN RIASCOS MOSQUERA <br> <small>28 años</small> </h3>  
       
     
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">
       <!-- cuando ingresemos el documento, el sistemas debe buscar el estudiante, sino debe
       sacar un modal form para registrarlo -->               
        

        <div class="form-group">
            <label for="exampleInputEmail1">Motivo de consulta</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Motivo de consulta">
          </div>
 
  <div class="row">
     <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputPassword1">Peso</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Peso">
      </div>
    </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="exampleInputPassword1">Altura</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Altura">
            </div>
      </div>
     </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Observaciones</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Diagnostico</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
  

   
@endsection

