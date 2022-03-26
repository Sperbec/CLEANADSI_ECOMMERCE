@extends('adminlte::page')

@section('title', 'Crear proveedores')

@section('content_header')
    <h1>Crear proveedores</h1>
@stop

@section('content')
{!!  Form::open(['route' => 'guardarProveedores']) !!}
    <div class="row">
        <div class="col-md-6">
            <label for="tipos_personas" class="mtop16">Tipo de persona:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="far fa-id-card"></i>
                </div>
                <select name="tipos_personas" id="tipos_personas" class="form-select" onchange="
                habilitar(this.value);">
                    <option value=''>Seleccione *</option>
                    @foreach ($tipos_personas as $tipopersona)
                        <option value="{{ $tipopersona->id_opcion }}">{{ $tipopersona->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>


<div class="row">
    <h4><br>Datos de persona:</h4>
</div>

    <div class="row">
        <div class="col-md-6">
            <label for="nombres">Nombres:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <!--Hacer uso del fontawesome-->
                    <i class="fas fa-user"></i>
                </div>

                <!--El segundo parámetro se manda en null porque no lleva ningun
                      valor por defecto-->
                {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'disabled','id'=>'nombres_persona']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <label for="apellidos" class="mtop16">Apellidos:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('apellidos', null, ['class' => 'form-control', 'required','disabled', 'id' => 'apellidos_persona']) !!}
            </div>
        </div>
    </div>

<div class="row">
  <div class="col-md-6">
      <label for="tipo_documento" class="mtop16" >Tipo de documento:</label>
      <div class="input-group">
          <div class="input-group-text">
              <i class="far fa-id-card"></i>
          </div>
          <select disabled  id ='tipo_documento_persona' name="tipo_documento" class="form-select"  required>
              <option value=''>Seleccione *</option>
              @foreach($tipos_documentos as $tipodocumento)
              <option value="{{$tipodocumento->id_opcion}}">{{$tipodocumento->nombre}}</option>
              @endforeach
          </select>
      </div>
  </div>  


  <div class="col-md-6">
      <label for="numero_documento" class="mtop16">Número de documento:</label>
      <div class="input-group">
          <div class="input-group-text">
              <i class="far fa-id-card"></i>
          </div>
          {!!  Form::text('numero_documento', null, ['class' => 'form-control', 'required', 'id'=>'documento_persona', 'disabled']) !!}
      </div>
  </div>
</div>


<div class="row">
    <div class="col-md-6">
        <label for="tipo_genero" class="mtop16" >Género:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-venus-mars"></i>
            </div>
            <select disabled id="genero_persona" name="genero" class="form-select" required>
                <option value=''>Seleccione *</option>
                @foreach($generos as $genero)
                <option value="{{$genero->id_opcion}}">{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div> 



  <div class="col-md-6">
    <label for="date" class="mtop16">Fecha de nacimiento:</label>
    <div class="">
        <div  class="input-group date" id="datepicker">
            <span class="input-group-text">
                <i class="fa fa-calendar"></i>
            </span>
            <input disabled id="calendario" type="text" class="form-control">
            <span class="input-group-append">
               
            </span>
        </div>
    </div>
</div>
</div>


<div class="row">
    
    <h4><br>Datos de proveedor:</h4>
</div>

<div class="row">
    <div class="col-md-6">
        <label id="nombres" for="nombres">Nombre:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="fa fa-industry" aria-hidden="true"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
                  valor por defecto-->
            {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'disabled', 'id'=>'nombre_proveedor']) !!}
        </div>
    </div>

    

    <div class="col-md">
        <label for="nit" class="mtop-16">NIT:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-marker"></i>
            </div>
            {!! Form::text('nit', null, ['class' => 'form-control', 'required','disabled', 'id' => 'nit']) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <label for="direccion">Dirección:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="fas fa-map-marked-alt"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
                  valor por defecto-->
            {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'disabled', 'id'=>'direccion']) !!}
        </div>
    </div>

    <div class="col-md">
        <label for="correo" class="mtop-16">Correo electrónico:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-envelope"></i>
            </div>
            {!! Form::text('nit', null, ['class' => 'form-control', 'required','disabled', 'id' => 'correo_electronico']) !!}
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <label  for="contacto">Contacto:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="fas fa-address-book"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
                  valor por defecto-->
            {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'disabled', 'id'=>'contacto']) !!}
        </div>
    </div>

    

    <div class="col-md">
        <label for="telefono" class="mtop-16">Teléfono móvil:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-mobile"></i>
            </div>
            {!! Form::text('nit', null, ['class' => 'form-control', 'required','disabled', 'id' => 'telefono_movil']) !!}
        </div>
    </div>
</div>



<div class="col-md-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Enviar</button>
</div>

{!!  Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- Para importar bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    <!-- Estilos para el datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
@stop

@section('js')
<!-- Importaciones para datepicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Script para funcionamiento del datepicker -->
<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker();
    });
</script>

<!-- habilitar o deshabilitar campos, dependiendo la selección de persona -->
<script>
    function habilitar(value)
		{
            
            if(value=="")
			{
				// deshabilitamos
                // campos de persona natural
				document.getElementById("nombres_persona").disabled=true;
                document.getElementById("apellidos_persona").disabled=true;
                document.getElementById("tipo_documento_persona").disabled=true;
                document.getElementById("documento_persona").disabled=true;
                document.getElementById("genero_persona").disabled=true;
                document.getElementById("calendario").disabled=true;
                // campos de persona jurídica
                document.getElementById("nombre_proveedor").disabled=true;
                document.getElementById("nit").disabled=true;
                document.getElementById("direccion").disabled=true;
                document.getElementById("correo_electronico").disabled=true;
                document.getElementById("contacto").disabled=true;
                document.getElementById("telefono_movil").disabled=true;
            }
       
			if(value=="20")
            
			{
				// habilitamos
                // campos de persona natural
				document.getElementById("nombres_persona").disabled=false;
                document.getElementById("apellidos_persona").disabled=false;
                document.getElementById("tipo_documento_persona").disabled=false;
                document.getElementById("documento_persona").disabled=false;
                document.getElementById("genero_persona").disabled=false;
                document.getElementById("calendario").disabled=false;
                // campos de persona jurídica
                document.getElementById("nombre_proveedor").disabled=true;
                document.getElementById("nit").disabled=true;
                document.getElementById("direccion").disabled=true;
                document.getElementById("correo_electronico").disabled=true;
                document.getElementById("contacto").disabled=true;
                document.getElementById("telefono_movil").disabled=true;
			}
            
            else if(value=="21" ){
				// deshabilitamos
                // campos de persona natural
				document.getElementById("nombres_persona").disabled=true;
                document.getElementById("apellidos_persona").disabled=true;
                document.getElementById("tipo_documento_persona").disabled=true;
                document.getElementById("documento_persona").disabled=true;
                document.getElementById("genero_persona").disabled=true;
                document.getElementById("calendario").disabled=true;
                // campos de persona jurídica
                document.getElementById("nombre_proveedor").disabled=false;
                document.getElementById("nit").disabled=false;
                document.getElementById("direccion").disabled=false;
                document.getElementById("correo_electronico").disabled=false;
                document.getElementById("contacto").disabled=false;
                document.getElementById("telefono_movil").disabled=false;
			}
        
		}
</script>

@stop
