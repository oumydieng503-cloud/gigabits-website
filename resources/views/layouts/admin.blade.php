<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('gigabits.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset(config('gigabits.logo')) }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">
    <header class="border-b border-slate-200/80 bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3">
                <div class="rounded-xl bg-white p-1.5 shadow-sm ring-1 ring-slate-200">
                    <img src="{{ asset(config('gigabits.logo')) }}" alt="" class="h-10 w-auto">
                </div>
                <div>
                    <p class="text-sm font-extrabold text-giga-900">Espace administrateur</p>
                    <p class="text-xs text-slate-500">{{ config('gigabits.name') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2 sm:gap-3">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-giga-700" target="_blank">Voir le site</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-xl bg-giga-800 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-giga-900">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
        <nav class="mx-auto flex max-w-7xl gap-2 overflow-x-auto px-4 pb-4 sm:px-6 lg:px-8">
            <a href="{{ route('admin.dashboard') }}" class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-giga-700 text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-giga-50 hover:text-giga-800' }}">Tableau de bord</a>
            <a href="{{ route('admin.applications') }}" class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('admin.applications*') ? 'bg-giga-700 text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-giga-50 hover:text-giga-800' }}">Candidatures</a>
            <a href="{{ route('admin.messages') }}" class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('admin.messages*') ? 'bg-giga-700 text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-giga-50 hover:text-giga-800' }}">Messages contact</a>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
