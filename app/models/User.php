<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $primaryKey='id_user';
    public  $table = 'users';
	public $errors;
	protected $fillable = array('email', 'fullname', 'password','user', 'address', 'rank');
	protected $perPage = 2;	// para paginacion, registros por pagina


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function isValid($data)
    {
        $rules = array(
            'user'  => 'required|min:4|max:15|unique:users',
            'password'  => 'required|min:7|confirmed',
            'email'     => 'required|email|unique:users',
            'fullname' => 'required|min:4|max:40',
            'address'  => 'required|min:8',
            'rank'  => 'required'
        );
        
        // Si el usuario existe:
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email y user del usuario actual
			$rules['email'] .= ',email,' . $this->id_user;
			$rules['user'] .= ',user,' . $this->id_user;
        }
        else // Si no existe...
        {
            // La clave es obligatoria:
            $rules['password'] .= '|required';
        }

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

}