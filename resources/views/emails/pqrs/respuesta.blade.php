@component('mail::message')
# Respuesta a tu PQRS

Hola **{{ $pqr->user_Emisor->Nombre }} {{ $pqr->user_Emisor->Apellido }}**,

Hemos respondido a tu PQRS enviada el **{{ $pqr->created_at->format('d/m/Y') }}**.

---

**Tu mensaje:**
{{ $pqr->Asunto }}
---
{{ $pqr->Descripcion }}

**Nuestra respuesta:**
{{ $pqr->Respuesta }}

---

Estado actualizado: **{{ $pqr->Estado_R }}**

Gracias por comunicarte con nosotros.

@endcomponent
