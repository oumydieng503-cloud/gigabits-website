@php
    $gradients = [
        'camera' => 'service-gradient-camera',
        'network' => 'service-gradient-network',
        'home' => 'service-gradient-home',
        'solar' => 'service-gradient-solar',
        'industry' => 'service-gradient-industry',
    ];
    $gradient = $gradients[$service->icon] ?? 'service-gradient-camera';
    $imagePath = service_image($service);
@endphp

<div {{ $attributes->merge(['class' => 'relative h-56 overflow-hidden rounded-t-2xl md:h-64 ' . $gradient]) }}>
    @if ($imagePath)
        <img src="{{ site_image($imagePath) }}" alt="{{ $service->title }}" class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-giga-950/30"></div>
    @endif
    <div class="absolute bottom-4 left-4 flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 text-white backdrop-blur">
        <x-icon :name="$service->icon" class="h-6 w-6" />
    </div>
</div>
