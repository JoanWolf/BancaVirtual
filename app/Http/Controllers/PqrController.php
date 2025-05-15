<?php

namespace App\Http\Controllers;

use App\Models\Pqr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PqrRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PqrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pqrs = Pqr::paginate();

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
        Pqr::create($request->validated());

        return Redirect::route('pqrs.index')
            ->with('success', 'Pqr created successfully.');
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
