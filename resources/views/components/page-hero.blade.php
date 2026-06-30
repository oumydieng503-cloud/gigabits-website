@props([
    'image' => null,
    'focal' => 'center center',
])

<section {{ $attributes->merge(['class' => 'relative overflow-hidden bg-giga-900 text-white']) }}>
    @if ($image)
        <img
            src="{{ site_image($image) }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
            style="object-position: {{ $focal }};"
        >
    @endif
    <div class="hero-overlay"></div>
    <div class="relative mx-auto flex min-h-[480px] max-w-7xl flex-col justify-end px-4 pb-14 pt-32 sm:px-6 md:min-h-[560px] lg:px-8">
        {{ $slot }}
    </div>
</section>
