@extends('layouts.admin')

@section('title', 'Candidatures')

@section('content')
    <h1 class="text-2xl font-bold text-giga-900">Candidatures</h1>
    <p class="mt-1 text-sm text-slate-500">Stages et emplois reçus via le site.</p>

    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Nom</th>
                        <th class="px-4 py-3 font-semibold">Type</th>
                        <th class="px-4 py-3 font-semibold">Poste</th>
                        <th class="px-4 py-3 font-semibold">Date</th>
                        <th class="px-4 py-3 font-semibold">Statut</th>
                        <th class="px-4 py-3 font-semibold"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $application->name }}</td>
                            <td class="px-4 py-3">{{ $application->typeLabel() }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $application->position ?: '—' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $application->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-3">
                                @if ($application->isUnread())
                                    <span class="rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">Non lu</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">Lu</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.applications.show', $application) }}" class="font-semibold text-giga-700 hover:underline">Voir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-500">Aucune candidature.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $applications->links() }}
    </div>
@endsection
