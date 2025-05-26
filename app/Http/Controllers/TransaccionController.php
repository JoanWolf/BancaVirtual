<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Llafe;
use App\Models\Transaccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaccionController extends Controller
{
    public function confirmarEnvio(Request $request)
    {
        $request->validate([
            'llave' =>  ['required', 'string', 'exists:llaves,valor'],
            'monto' => 'required|numeric|min:1',
            'mensaje' => 'required|string',
        ], [
        'llave.exists' => 'La llave ingresada no existe.',
    ]);

        $llaveValor = $request->input('llave');
        $monto = $request->input('monto');
        $mensaje = $request->input('mensaje');

        $llave = Llafe::where('valor', $llaveValor)->firstOrFail();
        $receptor = User::findOrFail($llave->Id_Propietario_fk);
        // Imprimir en terminal/registro de logs (storage/logs/laravel.log)
        \Illuminate\Support\Facades\Log::info('Registro de envío:');
        \Illuminate\Support\Facades\Log::info($llaveValor);
        \Illuminate\Support\Facades\Log::info($monto);
        \Illuminate\Support\Facades\Log::info($mensaje);
        \Illuminate\Support\Facades\Log::info($llave);
        \Illuminate\Support\Facades\Log::info($receptor);
        return view('home', [
            'subview' => 'confirmar-envios',
            'datos' => compact('receptor', 'llave', 'monto', 'mensaje')
        ]);
    }

    public function procesarEnvio(Request $request)
    {
        $request->validate([
            'llave_id' => 'required|exists:llaves,id',
            'monto' => 'required|numeric|min:1',
            'mensaje' => 'required|string'
        ]);
        $user = Auth::user();
        $emisor = User::findOrFail($user->id);
        $llave = Llafe::findOrFail($request->llave_id);
        $receptor = User::findOrFail($llave->Id_Propietario_fk);
        $monto = $request->monto;
        $mensaje = $request->mensaje;

        DB::transaction(function () use ($emisor, $receptor, $llave, $monto, $mensaje, &$transaccion) {
            // Actualizar saldos
            $emisor->Saldo -= $monto;
            $receptor->Saldo += $monto;

            $emisor->save();
            $receptor->save();

            // Guardar transacción
            $transaccion = Transaccione::create([
                'Fecha_Envio' => now()->toDateString(),
                'Referencia' => $mensaje,
                'Tipo' => 'Transferencia',
                'Estado' => 'Exitosa',
                'llave_fk' => $llave->id,
                'Emisor_fk' => $emisor->id,
                'Receptor_fk' => $receptor->id,
                'Monto' => $monto,
            ]);
        });

        return redirect()->route('recibo-envio', ['transaccion' => $transaccion->id]);
    }

    public function reciboEnvio($id)
    {
        $transaccion = Transaccione::with(['llafe', 'user_emisor', 'user_receptor'])->findOrFail($id);
        // Imprimir en terminal/registro de logs (storage/logs/laravel.log)
        \Illuminate\Support\Facades\Log::info('Recibo******:');
        \Illuminate\Support\Facades\Log::info($transaccion);

        return view('home', [
            'subview' => 'recibo',
            'transaccion' => $transaccion
        ]);
    }

    public function descargarReciboPDF($id)
    {
        $transaccion = Transaccione::with(['llafe', 'user_emisor', 'user_receptor'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.recibo', compact('transaccion'));

        return $pdf->download('recibo.pdf');
    }
}
