@extends('layouts.app')

@section('title', 'Nos services — ' . config('gigabits.name'))

@section('content')
    <x-page-hero
        :image="config('gigabits.images.heroes.services.src')"
        :focal="config('gigabits.images.heroes.services.focal')"
    >
        <h1 class="text-4xl font-extrabold md:text-5xl">Nos services</h1>
        <p class="mt-4 max-w-2xl text-lg text-giga-100">
            GIGABITS SARL vous accompagne avec des solutions sur mesure, performantes et sécurisées.
        </p>
    </x-page-hero>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-8">
                @foreach ($services as $service)
                    <div class="card overflow-hidden !p-0">
                        <div class="grid md:grid-cols-5">
                            <div class="md:col-span-2">
                                <x-service-cover :service="$service" class="!h-full !min-h-[260px] !rounded-none" />
                            </div>
                            <div class="flex flex-col justify-center p-8 md:col-span-3">
                                <h2 class="text-2xl font-bold text-giga-900">{{ $service->title }}</h2>
                                <p class="mt-2 text-slate-600">{{ $service->description }}</p>
                                <ul class="mt-4 grid gap-2 sm:grid-cols-2">
                                    @foreach (array_slice($service->items, 0, 4) as $item)
                                        <li class="flex items-start gap-2 text-sm text-slate-700">
                                            <svg class="mt-0.5 h-4 w-4 shrink-0 text-giga-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('services.show', $service) }}" class="mt-6 inline-flex items-center gap-1 text-sm font-semibold text-giga-600 hover:text-giga-800">
                                    Voir le détail complet
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
