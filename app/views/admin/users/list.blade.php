@extends ('admin/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')

	<h1>Lista de usuarios</h1>
	<p>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear un nuevo usuario</a>
  </p>
  
  <table class="table table-striped">
    <tr>
        <th>Full name</th>
        <th>Email</th>
        <th></th>
    </tr>
	@foreach ($users as $user)
    <tr>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->email }}</td>

        <td>
          <a href="{{ route('admin.users.show', $user->id_user) }}" class="btn btn-info">Ver</a>
          <a href="{{ route('admin.users.edit', $user->id_user) }}" class="btn btn-primary">Editar</a>
        </td>
        
    </tr>
    @endforeach
  </table>
  {{ $users->links() }}

@stop
