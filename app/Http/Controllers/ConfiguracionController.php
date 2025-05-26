<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Llafe;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class ConfiguracionController extends Controller
{
    public function update(Request $request)
{
    $userr = Auth::user();
    $user = User::findOrFail($userr->id);
    $request->validate([
        'Telefono' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'nullable|string|min:6'
    ]);

    $nuevoTelefono = $request->Telefono;
    $nuevoEmail = $request->email;

    $telefonoCambio = $nuevoTelefono !== $user->Telefono;
    $emailCambio = $nuevoEmail !== $user->email;

    $llavesDuplicadas = [];

    if ($telefonoCambio && Llafe::where('Valor', $nuevoTelefono)->exists()) {
        $llavesDuplicadas[] = 'Teléfono';
    }
    if ($telefonoCambio && Llafe::where('Valor', $user->Telefono)->exists()) {
        $llavesDuplicadas[] = 'Teléfono';
    }

    if ($emailCambio && Llafe::where('Valor', $nuevoEmail)->exists()) {
        $llavesDuplicadas[] = 'Email';
    }

    if ($emailCambio && Llafe::where('Valor', $user->email)->exists()) {
        $llavesDuplicadas[] = 'Email';
    }

    
    // Si hay duplicados y no está confirmado
    if (!empty($llavesDuplicadas) && !$request->has('confirmado')) {
        return redirect()->back()
            ->withErrors([
                'confirmacion' => 'El valor de ' . implode(' y ', $llavesDuplicadas) . ' ya está registrado como llave. ¿Deseas actualizar de todos modos?',
            ])
            ->withInput();
    }

    // Actualizar datos
    $oldTelefono = $user->Telefono;
    $oldEmail = $user->email;

    $user->Telefono = $nuevoTelefono;
    $user->email = $nuevoEmail;
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }
    $user->save();

    // Actualizar llaves si existen
    if ($telefonoCambio) {
        Llafe::where('Valor', $oldTelefono)->where('Id_Propietario_fk', $user->id)->update(['valor' => $nuevoTelefono]);
    }
    if ($emailCambio) {
        Llafe::where('Valor', $oldEmail)->where('Id_Propietario_fk', $user->id)->update(['valor' => $nuevoEmail]);
    }

    return redirect()->route('configuracion')->with('success', 'Datos actualizados correctamente.');
}

}
