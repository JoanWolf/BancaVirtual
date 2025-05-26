<?php

namespace App\Http\Controllers;

use App\Models\Llafe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
    public function users(Request $request)
    {
        $estado = $request->input('estado');
        $tipoDocumento = $request->input('tipo_documento');

        $query = User::query();

        if (!is_null($estado)) {
            $query->where('Estado', $estado);
        }

        if (!is_null($tipoDocumento)) {
            $query->where('Tipo_Documento', $tipoDocumento);
        }

        $users = $query->paginate();

        return view('home', [
            'subview' => 'user.index',
            'users' => $users,
            'i' => ($request->input('page', 1) - 1) * $users->perPage()
        ]);
    }

   public function createUser()
    {
        $user = new User();
        return view('home', [
            'subview' => 'user.create','user'=> $user
        ]);
    }

    public function storeUser(Request $request)
    {
        \Illuminate\Support\Facades\Log::info($request);
        $request->validate([
            'N_Documento' => 'required|string',
			'Nombre' => 'required|string',
			'Apellido' => 'required|string',
			'Fecha_Nacimiento' => 'required',
			'Tipo_Documento' => 'required|string',
			'Telefono' => 'required|string',
			'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $requestData = $request->all();
        // Imprimir en terminal/registro de logs (storage/logs/laravel.log)
        \Illuminate\Support\Facades\Log::info('Registro crear:');
        \Illuminate\Support\Facades\Log::info($requestData);
        // Asignar valores por defecto si no vienen en la solicitud
        $requestData['Rol'] = $requestData['Rol'] ?? 'user';
        $requestData['Saldo'] = $requestData['Saldo'] ?? 0;
        $requestData['Estado'] = $requestData['Estado'] ?? 1;
        $requestData['password'] = bcrypt($request->password);

        User::create($requestData);
        // return view('home', [
        //             'subview' => 'user.index'
        //         ]);
        return redirect()->route('users')->with('success', 'Usuario creado exitosamente.');
    }

    public function editUser(User $user)
    {
        // Imprimir en terminal/registro de logs (storage/logs/laravel.log)
        \Illuminate\Support\Facades\Log::info('Registro editar:');
        \Illuminate\Support\Facades\Log::info($user);
        return view('home', [
            'subview' => 'user.edit',
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'N_Documento' => 'required|string',
			'Nombre' => 'required|string',
			'Apellido' => 'required|string',
			'Fecha_Nacimiento' => 'required',
			'Tipo_Documento' => 'required|string',
			'Telefono' => 'required|string',
			'email' => 'required|string',
            
        ]);

        $data = $request->all();
        \Illuminate\Support\Facades\Log::info('Registro actualizar:');
        \Illuminate\Support\Facades\Log::info($data);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function showUser(User $user)
    {
        return view('home', [
            'subview' => 'user.show',
            'user' => $user
        ]);
    }
}
