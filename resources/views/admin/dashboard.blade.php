@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
    <h1 class="text-2xl font-bold text-giga-900">Tableau de bord</h1>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Candidatures</p>
            <p class="mt-1 text-3xl font-bold text-giga-900">{{ $applicationsCount }}</p>
            <p class="mt-1 text-xs text-amber-600">{{ $unreadApplications }} non lue(s)</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Messages contact</p>
            <p class="mt-1 text-3xl font-bold text-giga-900">{{ $messagesCount }}</p>
            <p class="mt-1 text-xs text-amber-600">{{ $unreadMessages }} non lu(s)</p>
        </div>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-2">
        <div>
            <div class="mb-3 flex items-center justify-between">
                <h2 class="font-bold text-giga-900">Dernières candidatures</h2>
                <a href="{{ route('admin.applications') }}" class="text-sm text-giga-600 hover:underline">Tout voir</a>
            </div>
            <div class="space-y-2">
                @forelse ($recentApplications as $application)
                    <a href="{{ route('admin.applications.show', $application) }}" class="block rounded-xl border border-slate-200 bg-white p-4 hover:border-giga-300">
                        <div class="flex items-center justify-between gap-2">
                            <p class="font-semibold text-slate-800">{{ $application->name }}</p>
                            @if ($application->isUnread())
                                <span class="rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">Nouveau</span>
                            @endif
                        </div>
                        <p class="text-sm text-slate-500">{{ $application->typeLabel() }} — {{ $application->created_at->format('d/m/Y H:i') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-slate-500">Aucune candidature pour le moment.</p>
                @endforelse
            </div>
        </div>

        <div>
            <div class="mb-3 flex items-center justify-between">
                <h2 class="font-bold text-giga-900">Derniers messages</h2>
                <a href="{{ route('admin.messages') }}" class="text-sm text-giga-600 hover:underline">Tout voir</a>
            </div>
            <div class="space-y-2">
                @forelse ($recentMessages as $message)
                    <a href="{{ route('admin.messages.show', $message) }}" class="block rounded-xl border border-slate-200 bg-white p-4 hover:border-giga-300">
                        <div class="flex items-center justify-between gap-2">
                            <p class="font-semibold text-slate-800">{{ $message->name }}</p>
                            @if ($message->read_at === null)
                                <span class="rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">Nouveau</span>
                            @endif
                        </div>
                        <p class="text-sm text-slate-500">{{ $message->subject ?: 'Sans sujet' }} — {{ $message->created_at->format('d/m/Y H:i') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-slate-500">Aucun message pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
