<x-mail::message>
# Nouveau message reçu

Vous avez reçu un message depuis le formulaire de contact du site **{{ config('gigabits.name') }}**.

<x-mail::panel>
**Nom :** {{ $contactMessage->name }}

@if ($contactMessage->email)
**E-mail :** {{ $contactMessage->email }}
@endif

@if ($contactMessage->phone)
**Téléphone :** {{ $contactMessage->phone }}
@endif

@if ($contactMessage->subject)
**Sujet :** {{ $contactMessage->subject }}
@endif
</x-mail::panel>

**Message :**

{{ $contactMessage->message }}

---

<x-mail::subcopy>
Reçu le {{ $contactMessage->created_at->format('d/m/Y à H:i') }} — répondez directement à cet e-mail si l'expéditeur a laissé une adresse.
</x-mail::subcopy>

</x-mail::message>
