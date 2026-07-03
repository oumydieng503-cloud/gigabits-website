<x-mail::message>
# Nouvelle candidature

Une candidature a été reçue depuis le site **{{ config('gigabits.name') }}**.

<x-mail::panel>
**Nom :** {{ $application->name }}

**E-mail :** {{ $application->email }}

@if ($application->phone)
**Téléphone :** {{ $application->phone }}
@endif

**Type :** {{ $application->typeLabel() }}

@if ($application->position)
**Poste / domaine :** {{ $application->position }}
@endif
</x-mail::panel>

@if ($application->message)
**Message :**

{{ $application->message }}
@endif

@if ($application->cv_path)
Un CV a été joint à la candidature. Consultez-le dans l'espace admin.
@endif

---

<x-mail::subcopy>
Reçu le {{ $application->created_at->format('d/m/Y à H:i') }}.
</x-mail::subcopy>

</x-mail::message>
