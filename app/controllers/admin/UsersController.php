<?php

class Admin_UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//GET llama a index, POST llama a store
	public function index()
	{
		$users = User::paginate();	// Se puede pasar int como argumento = paginacion
		//dd($users); //dump de $users
        return View::make('admin/users/list')->with('users', $users);
   }
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Creamos un nuevo objeto User para ser usado por el helper Form::model
		$user = new User;
		return View::make('admin/users/form')->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$data = Input::all();
		if ($user->isValid($data)) {
			// Si los datos son validos se los asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
		}else{
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('admin.users.create')->withInput()->withErrors($user->errors);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_user)
	{
		$user =  User::find($id_user);
		if (is_null($user)) {
			App::abort(404);
		}
		return View::make('admin/users/profile')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'Aqui editamos el usuario #' . $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}