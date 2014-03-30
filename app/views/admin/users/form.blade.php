@extends ('admin/layout')

@section ('title') Crear Usuarios @stop

@section ('content')

<h1>Crear Usuarios</h1>
  @if ($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Por favor corrige los siguentes errores:</strong>
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
    @endif
  {{-- Reemplazamos Form::open por Form::model: --}}
  {{ Form::model($user, array('route' => 'admin.users.store', 'method' => 'POST'), array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-8">
      {{ Form::label('user', 'Usuario') }}
      {{ Form::text('user', null, array('placeholder' => 'Introduce tu nombre de usuario', 'class' => 'form-control')) }}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('fullname', 'Nombre completo') }}
      {{ Form::text('fullname', null, array('placeholder' => 'Introduce tu nombre y apellido', 'class' => 'form-control')) }}        
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('address', 'Dirección') }}
      {{ Form::text('address', null, array('placeholder' => 'Introduce tu dirección', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('rank', 'Rango') }}

      {{ Form::select('rank', array('client' => 'Cliente', 'owner' => 'Propietario'), 'client', array('class' => 'form-control')); }}
    </div>
  </div>
  <p>
  {{ Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver a la lista de usuarios</a>
  </p>
{{ Form::close() }}

 

@stop