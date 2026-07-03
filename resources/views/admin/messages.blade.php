@extends('layouts.admin')

@section('title', 'Messages contact')

@section('content')
    <h1 class="text-2xl font-bold text-giga-900">Messages contact</h1>
    <p class="mt-1 text-sm text-slate-500">Messages reçus via le formulaire de contact.</p>

    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Nom</th>
                        <th class="px-4 py-3 font-semibold">Sujet</th>
                        <th class="px-4 py-3 font-semibold">Date</th>
                        <th class="px-4 py-3 font-semibold">Statut</th>
                        <th class="px-4 py-3 font-semibold"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $message->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $message->subject ?: '—' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-3">
                                @if ($message->read_at === null)
                                    <span class="rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">Non lu</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">Lu</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.messages.show', $message) }}" class="font-semibold text-giga-700 hover:underline">Voir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-slate-500">Aucun message.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>
@endsection
