<footer class="bg-giga-900 text-white">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-3">
            <div>
                <a href="{{ route('home') }}" class="inline-block rounded-xl bg-white p-3">
                    <img
                        src="{{ asset(config('gigabits.logo')) }}"
                        alt="{{ config('gigabits.name') }}"
                        class="h-16 w-auto"
                    >
                </a>
                <p class="mt-4 text-sm leading-relaxed text-giga-200">
                    {{ config('gigabits.slogan') }}
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-giga-300">Navigation</h3>
                <ul class="mt-4 space-y-2 text-sm text-giga-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-white">Services</a></li>
                    <li><a href="{{ route('team.index') }}" class="hover:text-white">Notre équipe</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-giga-300">Contact</h3>
                <ul class="mt-4 space-y-2 text-sm text-giga-100">
                    @foreach (config('gigabits.phones') as $phone)
                        <li>
                            <a href="tel:+221{{ str_replace(' ', '', $phone) }}" class="hover:text-white">{{ $phone }}</a>
                        </li>
                    @endforeach
                    <li>
                        <a href="mailto:{{ config('gigabits.email') }}" class="hover:text-white">{{ config('gigabits.email') }}</a>
                    </li>
                    <li>{{ config('gigabits.location') }}</li>
                </ul>

                <div class="mt-4 flex gap-3">
                    <a href="https://wa.me/{{ config('gigabits.whatsapp') }}" target="_blank" rel="noopener" class="rounded-full bg-green-600 p-2 hover:bg-green-500" title="WhatsApp">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    @if (config('gigabits.facebook') !== '#')
                        <a href="{{ config('gigabits.facebook') }}" target="_blank" rel="noopener" class="rounded-full bg-giga-700 p-2 hover:bg-giga-600" title="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @else
                        <span class="rounded-full bg-giga-800 p-2 opacity-50" title="Facebook — bientôt disponible">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </span>
                    @endif
                    <a href="{{ config('gigabits.tiktok') }}" target="_blank" rel="noopener" class="rounded-full bg-giga-700 p-2 hover:bg-giga-600" title="TikTok">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72 2.16.41 3.99 1.86 4.96 3.84.01-2.5 0-5 .01-7.5z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-giga-800 pt-6 text-center text-sm text-giga-300">
            &copy; {{ date('Y') }} {{ config('gigabits.name') }}. Tous droits réservés.
        </div>
    </div>
</footer>
