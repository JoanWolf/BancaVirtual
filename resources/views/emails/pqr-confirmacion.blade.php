<!DOCTYPE html>
<html>
<head>
    <title>Confirmación PQRS</title>
</head>
<body>
    <h1>Tu solicitud PQRS fue recibida</h1>
    <p>Gracias por comunicarte con nosotros.</p>
    <p><strong>Número de ticket:</strong> {{ $pqr->id }}</p>
    <p><strong>Asunto:</strong> {{ $pqr->Asunto }}</p>
    <p><strong>Fecha de envío:</strong> {{ $pqr->Fecha_Envio }}</p>
    <p>Nos pondremos en contacto contigo pronto.</p>
</body>
</html>
