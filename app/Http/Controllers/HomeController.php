<?php

namespace App\Http\Controllers;

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
        return view('home', ['subview' => 'registro-llaves']);
    }

    public function llavesRegistradas()
    {
        return view('home', ['subview' => 'llaves-registradas']);
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
