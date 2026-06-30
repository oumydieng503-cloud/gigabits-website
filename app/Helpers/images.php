<?php

if (! function_exists('site_image')) {
  /**
   * Retourne l'URL publique d'une image du site.
   */
  function site_image(?string $path): ?string
  {
    if (! $path) {
      return null;
    }

    return asset($path);
  }
}

if (! function_exists('service_image')) {
  /**
   * Retourne le chemin de l'image d'un service (BDD ou config).
   */
  function service_image(\App\Models\Service $service): ?string
  {
    $path = $service->image ?? config("gigabits.images.services.{$service->slug}");

    if (! $path || ! file_exists(public_path($path))) {
      return null;
    }

    return $path;
  }
}
