@extends ('admin/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')

	<h1>Perfil</h1>
  
  <table class="table table-striped">
    <tr>
        <th>Full name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->email }}</td>
    </tr>
  </table>

@stop
