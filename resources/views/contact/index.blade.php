@extends('layouts.app')

@section('title', 'Contact — ' . config('gigabits.name'))

@section('content')
    <section class="bg-gradient-to-br from-giga-900 to-giga-700 py-16 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">Contactez-nous</h1>
            <p class="mt-3 max-w-2xl text-lg text-giga-100">
                Une question, un projet ? N'hésitez pas à nous écrire ou à nous appeler.
            </p>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2">
                {{-- Infos contact --}}
                <div>
                    <h2 class="text-2xl font-bold text-giga-900">Nos coordonnées</h2>

                    <div class="mt-8 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-giga-100 text-giga-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-giga-900">Téléphone</h3>
                                @foreach (config('gigabits.phones') as $phone)
                                    <a href="tel:+221{{ str_replace(' ', '', $phone) }}" class="block text-slate-600 hover:text-giga-700">{{ $phone }}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-giga-100 text-giga-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-giga-900">E-mail</h3>
                                <a href="mailto:{{ config('gigabits.email') }}" class="text-slate-600 hover:text-giga-700">{{ config('gigabits.email') }}</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-giga-100 text-giga-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-giga-900">Adresse</h3>
                                <p class="text-slate-600">{{ config('gigabits.location') }}</p>
                            </div>
                        </div>

                        <a href="https://wa.me/{{ config('gigabits.whatsapp') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg bg-green-600 px-6 py-3 text-sm font-semibold text-white hover:bg-green-700">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Discuter sur WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Formulaire --}}
                <div class="card">
                    <h2 class="text-xl font-bold text-giga-900">Envoyez-nous un message</h2>

                    @if (session('success'))
                        <div class="mt-4 rounded-lg bg-green-50 border border-green-200 p-4 text-sm text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="mt-6 space-y-4">
                        @csrf

                        {{-- Honeypot anti-spam (caché) --}}
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
                                <label for="email" class="block text-sm font-medium text-slate-700">E-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
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

                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-700">Sujet</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">
                            @error('subject')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700">Message *</label>
                            <textarea name="message" id="message" rows="5" required
                                class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn-primary w-full sm:w-auto">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
