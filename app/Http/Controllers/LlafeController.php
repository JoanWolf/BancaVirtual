<?php

namespace App\Http\Controllers;

use App\Models\Llafe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LlafeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        Llafe::create($request->validated());

        return Redirect::route('llaves.index')
            ->with('success', 'Llafe created successfully.');
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

        return Redirect::route('llaves.index')
            ->with('success', 'Llafe deleted successfully');
    }
}
