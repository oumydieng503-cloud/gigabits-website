@extends('layouts.app')

@section('title', $service->title . ' — ' . config('gigabits.name'))

@section('content')
    @php $serviceImage = service_image($service); @endphp

    <x-page-hero :image="$serviceImage" focal="center center">
        <a href="{{ route('services.index') }}" class="mb-6 inline-flex items-center gap-1 text-sm text-giga-200 hover:text-white">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Retour aux services
        </a>
        <div class="flex items-center gap-4">
            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/15 backdrop-blur">
                <x-icon :name="$service->icon" class="h-8 w-8" />
            </div>
            <h1 class="text-3xl font-extrabold md:text-4xl">{{ $service->title }}</h1>
        </div>
    </x-page-hero>

    <section class="py-16">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <p class="text-lg leading-relaxed text-slate-600">{{ $service->description }}</p>

            <h2 class="mt-10 text-xl font-bold text-giga-900">Ce que nous proposons</h2>
            <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                @foreach ($service->items as $item)
                    <li class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-giga-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-slate-700">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="mt-12 overflow-hidden rounded-2xl bg-giga-50">
                <div class="grid md:grid-cols-2">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-giga-900">Besoin de ce service ?</h3>
                        <p class="mt-2 text-slate-600">Contactez-nous pour un devis gratuit et personnalisé.</p>
                        <div class="mt-6 flex flex-wrap gap-4">
                            <a href="{{ route('contact.index') }}" class="btn-primary">Demander un devis</a>
                            <a href="https://wa.me/{{ config('gigabits.whatsapp') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white hover:bg-green-700">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="relative min-h-[240px] bg-giga-800">
                        <img src="{{ site_image(config('gigabits.images.team.portail')) }}" alt="Équipe GIGABITS" class="h-full w-full object-cover object-top opacity-90">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
