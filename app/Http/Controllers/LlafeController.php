<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\Llafe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LlafeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class LlafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $llaves = Llafe::paginate();

        return view('llafe.index', compact('llaves'))
            ->with('i', ($request->input('page', 1) - 1) * $llaves->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $llafe = new Llafe();

        return view('llafe.create', compact('llafe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LlafeRequest $request): RedirectResponse
    {
        $user = Auth::user();
    $valor = $request->input('valor');

    // Verificar si la llave ya existe
    $existe = Llafe::where('valor', $valor)->exists();
    if ($existe) {
        return Redirect::back()->withErrors(['La llave ya ha sido registrada.']);
    }

    Llafe::create([
        'valor' => $valor,
        'id_propietario_fk' => $user->id,
    ]);

    return redirect()->route('llaves-registradas')
        ->with('success', 'Llave registrada exitosamente.');
        // Llafe::create($request->validated());

        // return Redirect::route('llaves.index')
        //     ->with('success', 'Llafe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $llafe = Llafe::find($id);

        return view('llafe.show', compact('llafe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $llafe = Llafe::find($id);

        return view('llafe.edit', compact('llafe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LlafeRequest $request, Llafe $llafe): RedirectResponse
    {
        $llafe->update($request->validated());

        return Redirect::route('llaves.index')
            ->with('success', 'Llafe updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Llafe::find($id)->delete();

        // Redirigir a la página anterior con un mensaje flash de éxito
    return redirect()->back()->with('success', 'Llave eliminada correctamente');

        // return Redirect::route('llaves.index')
        //     ->with('success', 'Llafe deleted successfully');
    }


public function buscarPorValor(Request $request)
{
    $valor = $request->input('valor');

    $llafe = Llafe::where('valor', $valor)->with('user')->first();

    if (!$llafe || !$llafe->user) {
        return response()->json(['error' => 'Llave o propietario no encontrado'], 404);
    }

    $nombre = $llafe->user->Nombre ?? '';
    $apellido = $llafe->user->Apellido ?? ''; // Asegúrate que ese campo exista
    $valor = $llafe->Valor ?? ''; // Asegúrate que ese campo exista

    // Enmascarar los datos
    $nombreProtegido = Str::limit($nombre, 4, str_repeat('*', max(0, strlen($nombre) - 4)));
    $apellidoProtegido = Str::limit($apellido, 4, str_repeat('*', max(0, strlen($apellido) - 4)));

    return response()->json([
        'nombre' => $nombreProtegido,
        'apellido' => $apellidoProtegido,
        'valor' => $valor,
    ]);
}

public function storeFromFormulario(Request $request)
{
    $user = Auth::user();

    $datos = explode('|', $request->input('llave_seleccionada'));

    if (count($datos) !== 2) {
        return back()->withErrors(['error' => 'Datos de la llave invalidos']);
    }

    $tipo = $datos[0];
    $valor = $datos[1];

    // Validar que no exista
    if (Llafe::where('valor', $valor)->exists()) {
        return back()->withErrors(['error' => 'Esta llave ya ha sido registrada.']);
    }

    Llafe::create([
        'Id_Propietario_fk' => $user->id,
        'Valor' => $valor,
        'Tipo' => $tipo,
    ]);

    return redirect()->route('llaves-registradas')->with('success', 'Llave registrada exitosamente.');
}

}


