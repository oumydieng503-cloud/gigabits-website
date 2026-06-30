@extends('layouts.app')

@section('title', config('gigabits.name') . ' — Accueil')

@section('content')
    {{-- Hero avec photo réelle --}}
    <section class="relative min-h-[85vh] overflow-hidden">
        <img
            src="{{ site_image(config('gigabits.images.hero')) }}"
            alt="Technicien GIGABITS sur chantier"
            class="absolute inset-0 h-full w-full object-cover"
            style="object-position: center center;"
        >
        <div class="hero-overlay"></div>

        <div class="relative mx-auto flex min-h-[85vh] max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-sm font-medium text-giga-100 backdrop-blur">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                    Expertise · Qualité · Sécurité
                </p>
                <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-white md:text-5xl lg:text-6xl">
                    {{ config('gigabits.tagline') }}
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-giga-100 md:text-xl">
                    {{ config('gigabits.description') }}
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('services.index') }}" class="btn-primary">Découvrir nos services</a>
                    <a href="{{ route('contact.index') }}" class="btn-outline">Demander un devis</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Points forts --}}
    <section class="relative z-10 -mt-8 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-2xl shadow-giga-900/10 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (config('gigabits.strengths') as $strength)
                <div class="flex items-start gap-4 rounded-xl p-2">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-giga-100 text-giga-700">
                        <x-icon :name="$strength['icon']" class="h-6 w-6" />
                    </div>
                    <p class="text-sm font-semibold leading-snug text-giga-900">{{ $strength['title'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- À propos avec photo équipe --}}
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="gallery-item aspect-[4/3] lg:aspect-auto lg:h-[480px]">
                    <img src="{{ site_image(config('gigabits.images.team.uniformes')) }}" alt="Équipe GIGABITS en uniforme" class="h-full w-full object-cover">
                </div>
                <div>
                    <p class="text-sm font-bold uppercase tracking-widest text-giga-600">Qui sommes-nous ?</p>
                    <h2 class="mt-2 section-title">Une équipe pro, uniformée et à votre écoute</h2>
                    <p class="mt-4 text-lg leading-relaxed text-slate-600">
                        Basés à Dakar, Keur Massar, nos techniciens interviennent rapidement pour vos projets de sécurité,
                        réseau, électricité, solaire et câblage industriel.
                    </p>
                    <ul class="mt-6 space-y-3">
                        @foreach (['Techniciens certifiés et expérimentés', 'Intervention rapide sur Dakar et environs', 'Devis gratuit et solutions sur mesure'] as $point)
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-giga-100 text-giga-700">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                </span>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('team.index') }}" class="btn-primary mt-8">Rencontrer l'équipe</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="bg-slate-100/80 py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="section-title">Nos services</h2>
                <p class="section-subtitle mx-auto">Des solutions complètes pour sécuriser, connecter et moderniser vos espaces.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <a href="{{ route('services.show', $service) }}" class="card group block !p-0 overflow-hidden">
                        <x-service-cover :service="$service" />
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-giga-900 group-hover:text-giga-700">{{ $service->title }}</h3>
                            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-600">{{ $service->description }}</p>
                            <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-giga-600 group-hover:gap-2 transition-all">
                                En savoir plus
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('services.index') }}" class="btn-primary">Voir tous les services</a>
            </div>
        </div>
    </section>

    {{-- Galerie chantier --}}
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h2 class="section-title">Sur le terrain</h2>
                <p class="section-subtitle mx-auto">Nos techniciens en action, au service de vos projets.</p>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                <div class="gallery-item md:col-span-2 md:row-span-2 aspect-[16/10] md:aspect-auto md:min-h-[400px]">
                    <img src="{{ site_image(config('gigabits.images.team.chantier')) }}" alt="Technicien sur chantier">
                    <div class="absolute inset-0 bg-gradient-to-t from-giga-950/60 to-transparent"></div>
                    <p class="absolute bottom-4 left-4 text-sm font-semibold text-white">Intervention sur site</p>
                </div>
                <div class="gallery-item aspect-[4/3]">
                    <img src="{{ site_image(config('gigabits.images.team.bureau')) }}" alt="Équipe GIGABITS">
                </div>
                <div class="gallery-item aspect-[4/3]">
                    <img src="{{ site_image(config('gigabits.images.team.talla')) }}" alt="Talla DIENG - Technicien">
                    <div class="absolute inset-0 bg-gradient-to-t from-giga-950/60 to-transparent"></div>
                    <p class="absolute bottom-4 left-4 text-sm font-semibold text-white">Talla DIENG — Technicien</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative overflow-hidden bg-giga-900 py-20 text-white">
        <div class="absolute -right-20 top-0 h-64 w-64 rounded-full bg-giga-600/30 blur-3xl"></div>
        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold md:text-4xl">{{ config('gigabits.slogan') }}</h2>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-giga-200">
                Contactez-nous dès aujourd'hui pour un devis gratuit et personnalisé.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="tel:+221{{ str_replace(' ', '', config('gigabits.phones')[0]) }}" class="btn-outline">
                    {{ config('gigabits.phones')[0] }}
                </a>
                <a href="https://wa.me/{{ config('gigabits.whatsapp') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-green-600/30 transition hover:-translate-y-0.5 hover:bg-green-700">
                    WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection
