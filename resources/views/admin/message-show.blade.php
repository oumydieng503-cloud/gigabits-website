@extends('layouts.admin')

@section('title', 'Message — ' . $message->name)

@section('content')
    <a href="{{ route('admin.messages') }}" class="text-sm font-medium text-giga-700 hover:underline">← Retour aux messages</a>

    <div class="mt-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-giga-900">{{ $message->name }}</h1>
                <p class="mt-1 text-sm text-slate-500">{{ $message->created_at->format('d/m/Y à H:i') }}</p>
            </div>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">Supprimer</button>
            </form>
        </div>

        <dl class="mt-6 grid gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">E-mail</dt>
                <dd class="mt-1">
                    @if ($message->email)
                        <a href="mailto:{{ $message->email }}" class="text-giga-700 hover:underline">{{ $message->email }}</a>
                    @else
                        —
                    @endif
                </dd>
            </div>
            <div>
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">Téléphone</dt>
                <dd class="mt-1">{{ $message->phone ?: '—' }}</dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">Sujet</dt>
                <dd class="mt-1">{{ $message->subject ?: '—' }}</dd>
            </div>
        </dl>

        <div class="mt-6">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Message</h2>
            <p class="mt-2 whitespace-pre-line rounded-xl bg-slate-50 p-4 text-slate-700">{{ $message->message }}</p>
        </div>
    </div>
@endsection
