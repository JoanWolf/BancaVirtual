<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtenemos los valores del filtro (pueden venir vacíos)
        $estado = $request->input('estado');
        $tipoDocumento = $request->input('tipo_documento');
        // Construimos la consulta
        $query = User::query();
        if (!is_null($estado)) {
            $query->where('Estado', $estado);
        }

        if (!is_null($tipoDocumento)) {
            $query->where('Tipo_Documento', $tipoDocumento);
        }

        $users = $query->paginate();
        //$users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Asignar valores por defecto si no vienen en la solicitud
        $data['Rol'] = $data['Rol'] ?? 'user';
        $data['Saldo'] = $data['Saldo'] ?? 0;
        $data['Estado'] = $data['Estado'] ?? 1;

        User::create($data);

        return Redirect::route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return Redirect::route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
