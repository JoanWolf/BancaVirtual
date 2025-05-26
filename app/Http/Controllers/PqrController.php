<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pqr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PqrRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\PqrCreadaMailable;
class PqrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $query = Pqr::query();

        // Si hay fecha "desde", filtramos desde esa fecha
        if ($desde) {
            $query->whereDate('Fecha_Envio', '>=', $desde);
        }

        // Si hay fecha "hasta", filtramos hasta esa fecha
        if ($hasta) {
            $query->whereDate('Fecha_Envio', '<=', $hasta);
        }

        $pqrs = $query->paginate();

        return view('pqr.index', compact('pqrs'))
            ->with('i', ($request->input('page', 1) - 1) * $pqrs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pqr = new Pqr();

        return view('pqr.create', compact('pqr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PqrRequest $request): RedirectResponse
    {
        $request->validate([
            'Asunto' => 'required|string',
            'Descripcion' => 'required|string',
            'Estado' => 'required|string', // el tipo
        ]);

        $pqr = Pqr::create([
            'Asunto' => $request->Asunto,
            'Descripcion' => $request->Descripcion,
            'Estado' => $request->Estado,
            'Fecha_Envio' => now(),
            'Emisor_fk' => Auth::id(),
            'Respuesta' => '',
            'Receptor_fk' => null,
        ]);

        // Enviar correo al usuario
        Mail::to(Auth::user()->email)->send(new PqrCreadaMailable($pqr));

        return redirect()->back()->with('success', 'PQRS enviada exitosamente. Revisa tu correo.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pqr = Pqr::find($id);

        return view('pqr.show', compact('pqr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pqr = Pqr::find($id);

        return view('pqr.edit', compact('pqr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PqrRequest $request, Pqr $pqr): RedirectResponse
    {
        $pqr->update($request->validated());

        return Redirect::route('pqrs.index')
            ->with('success', 'Pqr updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pqr::find($id)->delete();

        return Redirect::route('pqrs.index')
            ->with('success', 'Pqr deleted successfully');
    }
}
