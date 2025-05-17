<?php

namespace App\Http\Controllers;

use App\Models\Transaccione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TransaccioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $estado = $request->input('estado');

        $query = Transaccione::query();

        // Filtrar por fecha de envío
        if ($desde) {
            $query->whereDate('Fecha_envio', '>=', $desde);
        }

        if ($hasta) {
            $query->whereDate('Fecha_envio', '<=', $hasta);
        }

        // Filtrar por estado
        if ($estado) {
            $query->where('Estado', $estado);
        }

        $transacciones = $query->paginate();

        return view('transaccione.index', compact('transacciones'))
            ->with('i', ($request->input('page', 1) - 1) * $transacciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $transaccione = new Transaccione();

        return view('transaccione.create', compact('transaccione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaccioneRequest $request): RedirectResponse
    {
        Transaccione::create($request->validated());

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $transaccione = Transaccione::find($id);

        return view('transaccione.show', compact('transaccione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $transaccione = Transaccione::find($id);

        return view('transaccione.edit', compact('transaccione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaccioneRequest $request, Transaccione $transaccione): RedirectResponse
    {
        $transaccione->update($request->validated());

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Transaccione::find($id)->delete();

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione deleted successfully');
    }
}
