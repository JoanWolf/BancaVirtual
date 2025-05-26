<h2>Recibo de Envío</h2>
<p><strong>Para:</strong> {{ $transaccion->user_receptor->Nombre }} {{ $transaccion->user_receptor->Apellido }}</p>
<p><strong>Llave:</strong> {{ $transaccion->llafe->Valor }}</p>
<p><strong>Banco:</strong> Banca Digital</p>
<p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($transaccion->Fecha_Envio)->format('d/m/Y') }}</p>
<p><strong>¿Cuánto?:</strong> ${{ number_format($transaccion->Monto, 0, ',', '.') }}</p>
<p><strong>Referencia:</strong> {{ $transaccion->Referencia }}</p>
