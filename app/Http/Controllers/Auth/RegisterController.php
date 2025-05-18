<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/login';

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
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Tipo_Documento' => 'required',
            'N_Documento' => 'required',
            'Fecha_Nacimiento' => 'required|date',
            'Telefono' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'Nombre' => $data['Nombre'],
            'Apellido' => $data['Apellido'],
            'Tipo_Documento' => $data['Tipo_Documento'],
            'N_Documento' => $data['N_Documento'],
            'Fecha_Nacimiento' => $data['Fecha_Nacimiento'],
            'Telefono' => $data['Telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'Rol' => 'user',       // Valor por defecto
            'Saldo' => 0,          // Valor por defecto
            'Estado' => 1          // Valor por defecto
        ]);
    }
}
