# Preparation deploiement GIGABITS SARL
# Executer sur ton PC avant d'envoyer les fichiers sur l'hebergeur

$ErrorActionPreference = "Stop"
$root = Split-Path -Parent $PSScriptRoot
Set-Location $root

Write-Host "1/3 - Compilation des assets (CSS/JS)..." -ForegroundColor Cyan
npm run build

Write-Host "2/3 - Installation Composer (production, sans dev)..." -ForegroundColor Cyan
composer install --no-dev --optimize-autoloader

Write-Host "3/3 - Verification..." -ForegroundColor Cyan
if (-not (Test-Path "public\build\manifest.json")) {
    throw "Erreur: public/build/manifest.json introuvable. Lancez npm run build."
}

Write-Host ""
Write-Host "Pret pour le deploiement !" -ForegroundColor Green
Write-Host ""
Write-Host "Fichiers a envoyer sur l'hebergeur (via FileZilla ou gestionnaire fichiers):" -ForegroundColor Yellow
Write-Host "  - Tout le dossier gigabits-website SAUF: .git, node_modules, tests"
Write-Host "  - Inclure: app, bootstrap, config, database, public, resources, routes, storage, vendor"
Write-Host "  - Creer le fichier .env sur le serveur depuis deploy/env.production.example"
Write-Host ""
Write-Host "Sur le serveur:" -ForegroundColor Yellow
Write-Host "  php artisan key:generate"
Write-Host "  php artisan migrate --force"
Write-Host "  php artisan storage:link"
Write-Host "  php artisan config:cache"
Write-Host "  php artisan route:cache"
Write-Host "  php artisan view:cache"
Write-Host "  chmod -R 775 storage bootstrap/cache"
