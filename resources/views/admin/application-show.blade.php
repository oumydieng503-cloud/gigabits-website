@extends('layouts.admin')

@section('title', 'Candidature — ' . $application->name)

@section('content')
    <a href="{{ route('admin.applications') }}" class="text-sm font-medium text-giga-700 hover:underline">← Retour aux candidatures</a>

    <div class="mt-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-giga-900">{{ $application->name }}</h1>
                <p class="mt-1 text-sm text-slate-500">{{ $application->typeLabel() }} — {{ $application->created_at->format('d/m/Y à H:i') }}</p>
            </div>
            <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" onsubmit="return confirm('Supprimer cette candidature ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">Supprimer</button>
            </form>
        </div>

        <dl class="mt-6 grid gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">E-mail</dt>
                <dd class="mt-1"><a href="mailto:{{ $application->email }}" class="text-giga-700 hover:underline">{{ $application->email }}</a></dd>
            </div>
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">Téléphone</dt>
                <dd class="mt-1">{{ $application->phone ?: '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">Poste / domaine</dt>
                <dd class="mt-1">{{ $application->position ?: '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">CV</dt>
                <dd class="mt-1">
                    @if ($application->cv_path)
                        <a href="{{ route('admin.applications.cv', $application) }}" class="font-semibold text-giga-700 hover:underline">Télécharger le CV</a>
                    @else
                        —
                    @endif
                </dd>
            </div>
        </dl>

        @if ($application->message)
            <div class="mt-6">
                <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Message</h2>
                <p class="mt-2 whitespace-pre-line rounded-xl bg-slate-50 p-4 text-slate-700">{{ $application->message }}</p>
            </div>
        @endif
    </div>
@endsection
