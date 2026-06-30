@extends('layouts.app')

@section('title', 'Notre équipe — ' . config('gigabits.name'))

@section('content')
    <x-page-hero
        :image="config('gigabits.images.heroes.team.src')"
        :focal="config('gigabits.images.heroes.team.focal')"
    >
        <h1 class="text-4xl font-extrabold md:text-5xl">Notre équipe</h1>
        <p class="mt-4 max-w-2xl text-lg text-giga-100">
            Des professionnels passionnés, identifiés et équipés pour vos projets technologiques.
        </p>
    </x-page-hero>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if ($members->isNotEmpty())
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($members as $member)
                        <div class="card overflow-hidden !p-0">
                            <div class="aspect-[4/5] overflow-hidden bg-slate-200">
                                @if ($member->photo)
                                    <img
                                        src="{{ site_image($member->photo) }}"
                                        alt="{{ $member->name }}"
                                        class="h-full w-full object-cover object-top transition duration-500 hover:scale-105"
                                    >
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-giga-900">{{ $member->name }}</h3>
                                @if ($member->role)
                                    <p class="mt-1 text-sm font-semibold uppercase tracking-wide text-giga-600">{{ $member->role }}</p>
                                @endif
                                @if ($member->bio)
                                    <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $member->bio }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-20">
                <h2 class="section-title text-center">L'équipe au travail</h2>
                <p class="section-subtitle mx-auto text-center">Des interventions professionnelles, partout à Dakar.</p>

                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        [config('gigabits.images.team.chantier'), 'Sur chantier', '!object-top'],
                        [config('gigabits.images.team.bureau'), 'Préparation technique', '!object-center'],
                        [config('gigabits.images.team.portail'), 'Intervention client', '!object-top'],
                    ] as [$photo, $caption, $imgClass])
                        <div class="gallery-item aspect-[4/3]">
                            <img src="{{ site_image($photo) }}" alt="{{ $caption }}" class="{{ $imgClass }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-giga-950/70 via-transparent to-transparent"></div>
                            <p class="absolute bottom-4 left-4 text-sm font-semibold text-white">{{ $caption }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
