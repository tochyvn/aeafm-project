<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/Admin/user';

		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{  
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'sex' => 'required|string',
			'name' => 'required|max:255',
			'first_name' => 'required|max:255',
			'phone_number' =>'numeric|min:8',
			'town' => 'required|max:255',
			'country_origin_id' =>'integer',
			'country_residence_id' =>'integer',
			'level_id' =>'integer',
			'domaine_id' =>'integer',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',

		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		
		return User::create([
			'sex' => $data['sex'],
			'name' => $data['name'],
			'first_name' => $data['first_name'],
			'phone_number' => $data['phone_number'],
			'town' => $data['town'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'country_origin_id' => $data['country_origin_id'],
			'country_residence_id' => $data['country_residence_id'],
			'level_id' => $data['level_id'],
			'domaine_id' => $data['level_id'],
			
		]);
	}
}
