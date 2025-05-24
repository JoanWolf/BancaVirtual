<?php

namespace App\Http\Controllers;

use App\Models\Llafe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $saldo = Auth::user()->Saldo; // Obtenemos el saldo del usuario logueado
        //return view('dashboard', ); // Pasamos el saldo a la vista
        return view('home', ['subview' => 'dashboard', 'saldo' => $saldo]);
    }


    public function registroLlaves()
    {
        $user = Auth::user();
        // Generamos las llaves potenciales
        $llavesPosibles = [
            'Documento' => $user->N_Documento,
            'celular' => $user->Telefono,
            'correo' => $user->email,
            'llaveBancaria' => '@bandi' . substr($user->N_Documento, -4),
        ];

        // Consultamos llaves ya registradas
        $llavesRegistradas = Llafe::pluck('valor')->toArray();

        // Filtramos llaves no registradas
        $llavesDisponibles = [];
        foreach ($llavesPosibles as $tipo => $valor) {
            if (!in_array($valor, $llavesRegistradas)) {
                $llavesDisponibles[] = [
                    'tipo' => $tipo,
                    'valor' => $valor,
                ];
            }
        }

        return view('home', [
            'subview' => 'registro-llaves',
            'llavesDisponibles' => $llavesDisponibles
        ]);
    }

    public function llavesRegistradas()
    {
        $user = Auth::user();
        $llaves = Llafe::where('Id_Propietario_fk', $user->id)->get();
        // Imprimir en terminal/registro de logs (storage/logs/laravel.log)
        \Illuminate\Support\Facades\Log::info('Llaves registradas del usuario:');
        \Illuminate\Support\Facades\Log::info($llaves);

        return view('home', ['subview' => 'llaves-registradas', 'llaves' => $llaves]);
    }

    public function envios()
    {
        return view('home', ['subview' => 'envios']);
    }

    public function confirmarEnvios()
    {
        return view('home', ['subview' => 'confirmar-envios']);
    }

    public function reciboEnvio()
    {
        return view('home', ['subview' => 'recibo']);
    }



    public function configuracion()
    {
        return view('home', ['subview' => 'configuracion']);
    }

    public function pqrs()
    {
        return view('home', ['subview' => 'pqrs']);
    }
}
