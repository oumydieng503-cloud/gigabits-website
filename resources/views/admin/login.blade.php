<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion admin — {{ config('gigabits.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset(config('gigabits.logo')) }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative flex min-h-screen items-center justify-center overflow-hidden bg-giga-950 px-4 font-sans antialiased">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-giga-600/30 blur-3xl"></div>
        <div class="absolute -right-16 bottom-0 h-80 w-80 rounded-full bg-blue-500/20 blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md overflow-hidden rounded-3xl border border-white/10 bg-white shadow-2xl shadow-giga-950/40">
        <div class="bg-gradient-to-br from-giga-800 to-giga-600 px-8 py-8 text-center text-white">
            <div class="mx-auto inline-flex rounded-2xl bg-white p-3 shadow-lg">
                <img src="{{ asset(config('gigabits.logo')) }}" alt="{{ config('gigabits.name') }}" class="h-14 w-auto">
            </div>
            <h1 class="mt-5 text-2xl font-extrabold tracking-tight">Espace administrateur</h1>
            <p class="mt-2 text-sm text-giga-100">Connectez-vous pour gérer les candidatures et les messages.</p>
        </div>

        <div class="px-8 py-8">
            @if (session('success'))
                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="password" class="mb-1.5 block text-sm font-semibold text-slate-700">Mot de passe</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            autofocus
                            placeholder="Saisissez votre mot de passe"
                            class="w-full rounded-xl border border-slate-300 py-3 pl-11 pr-4 text-sm shadow-sm transition focus:border-giga-500 focus:outline-none focus:ring-2 focus:ring-giga-500/20"
                        >
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-giga-700 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-giga-700/30 transition hover:bg-giga-800">
                    Se connecter
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500">
                <a href="{{ route('home') }}" class="font-medium text-giga-700 hover:underline">← Retour au site</a>
            </p>
        </div>
    </div>
</body>
</html>
