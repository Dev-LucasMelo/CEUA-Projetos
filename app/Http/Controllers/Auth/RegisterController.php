<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;
use App\Models\Unidade;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $instituicaos = Instituicao::all();
        $unidades = Unidade::all();
        return view('auth.register', compact('instituicaos', 'unidades'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
        $data['celular'] = preg_replace('/[^0-9]/', '', $data['celular']);
        
        return Validator::make($data, [
            'name'          => ['required', 'string', 'min:10', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'cpf'           => ['required', 'cpf', 'min:11', 'max:11', 'unique:users'],
            'celular'       => ['required', 'min:11', 'max:11'],
            'rg'            => ['required', 'string', 'min:7', 'max:14'],
            'instituicao'   => ['required', 'numeric'],
            'unidade'       => ['required', 'numeric']
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cpf' => preg_replace('/[^0-9]/', '', $data['cpf']),
            'rg' => preg_replace('/[^0-9]/', '', $data['rg']),
            'celular' => preg_replace('/[^0-9]/', '', $data['celular']),
            'unidade_id' => $data['unidade'],
            'tipo_usuario_id' => $data['tipo_usuario_id'],
        ]);
    }
}
