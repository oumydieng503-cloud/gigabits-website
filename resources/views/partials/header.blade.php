<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center shrink-0">
            <img
                src="{{ asset(config('gigabits.logo')) }}"
                alt="{{ config('gigabits.name') }}"
                class="h-14 w-auto sm:h-16"
            >
        </a>

        <nav class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') ? 'text-giga-700' : 'text-slate-600 hover:text-giga-700' }}">Accueil</a>
            <a href="{{ route('services.index') }}" class="text-sm font-medium {{ request()->routeIs('services.*') ? 'text-giga-700' : 'text-slate-600 hover:text-giga-700' }}">Services</a>
            <a href="{{ route('team.index') }}" class="text-sm font-medium {{ request()->routeIs('team.*') ? 'text-giga-700' : 'text-slate-600 hover:text-giga-700' }}">Notre équipe</a>
            <a href="{{ route('contact.index') }}" class="btn-primary !py-2 !px-4">Contact</a>
        </nav>

        <button type="button" id="mobile-menu-btn" class="rounded-lg p-2 text-giga-800 md:hidden" aria-label="Menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <nav id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-4 py-4 md:hidden">
        <div class="flex flex-col gap-3">
            <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-giga-50">Accueil</a>
            <a href="{{ route('services.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-giga-50">Services</a>
            <a href="{{ route('team.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-giga-50">Notre équipe</a>
            <a href="{{ route('contact.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-giga-700 hover:bg-giga-50">Contact</a>
        </div>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>
