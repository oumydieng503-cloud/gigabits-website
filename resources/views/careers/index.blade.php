@extends('layouts.app')

@section('title', 'Carrières — ' . config('gigabits.name'))

@section('content')
    <section class="bg-gradient-to-br from-giga-900 to-giga-700 py-16 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">Rejoignez notre équipe</h1>
            <p class="mt-3 max-w-2xl text-lg text-giga-100">
                Vous cherchez un stage ou un emploi chez GIGABITS SARL ? Envoyez-nous votre candidature.
            </p>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="card">
                <h2 class="text-xl font-bold text-giga-900">Formulaire de candidature</h2>
                <p class="mt-2 text-sm text-slate-600">
                    Remplissez le formulaire ci-dessous. Vous pouvez joindre votre CV (PDF, DOC ou DOCX, max 5 Mo).
                </p>

                @if (session('success'))
                    <div class="mt-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                    @csrf

                    <div class="hidden" aria-hidden="true">
                        <label for="website">Ne pas remplir</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700">Nom complet *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">E-mail *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                            @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700">Téléphone</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                            @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="type" class="block text-sm font-medium text-slate-700">Type de candidature *</label>
                            <select name="type" id="type" required
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                                <option value="">Choisir...</option>
                                <option value="stage" @selected(old('type') === 'stage')>Stage</option>
                                <option value="emploi" @selected(old('type') === 'emploi')>Emploi</option>
                            </select>
                            @error('type')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="position" class="block text-sm font-medium text-slate-700">Poste / domaine souhaité</label>
                            <input type="text" name="position" id="position" value="{{ old('position') }}"
                                placeholder="Ex. Technicien réseau, installation solaire..."
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                            @error('position')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700">Message / lettre de motivation</label>
                        <textarea name="message" id="message" rows="5"
                            class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="cv" class="block text-sm font-medium text-slate-700">CV (PDF, DOC, DOCX — max 5 Mo)</label>
                        <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx,application/pdf"
                            class="mt-1 block w-full text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-giga-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-giga-700 hover:file:bg-giga-200">
                        @error('cv')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn-primary w-full sm:w-auto">Envoyer ma candidature</button>
                </form>
            </div>
        </div>
    </section>
@endsection
