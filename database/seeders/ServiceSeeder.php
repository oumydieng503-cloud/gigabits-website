<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Installation & Configuration de Caméras de Surveillance',
                'slug' => 'cameras-surveillance',
                'icon' => 'camera',
                'description' => 'Sécurisez vos locaux avec des systèmes de vidéosurveillance professionnels, installés et configurés par nos experts.',
                'items' => [
                    'Étude et conseil personnalisé',
                    'Installation de caméras intérieures et extérieures',
                    'Configuration et paramétrage',
                    'Accès à distance (mobile / PC)',
                    'Enregistrement et stockage sécurisé',
                    'Maintenance et support',
                ],
                'image' => 'images/cameras.jpg',
                'sort_order' => 1,
            ],
            [
                'title' => 'Réseau Télécom',
                'slug' => 'reseau-telecom',
                'icon' => 'network',
                'description' => 'Conception et déploiement de réseaux informatiques et télécoms performants pour entreprises et particuliers.',
                'items' => [
                    'Câblage structuré (Cuivre & Fibre optique)',
                    'Installation de racks et baies',
                    'Configuration routeurs, switchs et firewalls',
                    'Réseaux LAN / WAN',
                    'Maintenance et sécurité réseau',
                ],
                'image' => 'images/reseau.jpg',
                'sort_order' => 2,
            ],
            [
                'title' => 'Installation Domicile',
                'slug' => 'installation-domicile',
                'icon' => 'home',
                'description' => 'Solutions électriques et domotiques pour un habitat moderne, sûr et confortable.',
                'items' => [
                    'Installation électrique générale',
                    'Éclairage intérieur et extérieur',
                    'Prises, interrupteurs et tableaux',
                    'Domotique',
                    'Sécurité et contrôle d\'accès',
                ],
                'image' => 'images/domicile.jpg',
                'sort_order' => 3,
            ],
            [
                'title' => 'Installation de Panneaux Solaires',
                'slug' => 'panneaux-solaires',
                'icon' => 'solar',
                'description' => 'Passez à l\'énergie solaire avec des installations fiables pour particuliers et professionnels.',
                'items' => [
                    'Étude de faisabilité',
                    'Installation de panneaux solaires',
                    'Raccordement et mise en service',
                    'Solutions résidentielles et professionnelles',
                    'Maintenance et suivi',
                ],
                'image' => 'images/solaire.jpg',
                'sort_order' => 4,
            ],
            [
                'title' => 'Câblage Industriel (Toutes Branches)',
                'slug' => 'cablage-industriel',
                'icon' => 'industry',
                'description' => 'Câblage industriel robuste et conforme aux normes pour tous types d\'environnements professionnels.',
                'items' => [
                    'Alimentation électrique',
                    'Commande et contrôle',
                    'Automatisme industriel',
                    'Réseaux informatiques',
                    'Instrumentation et mesure',
                    'Sécurité incendie et alarmes',
                    'Audio/Vidéo et sonorisation',
                    'Mise à la terre et équipotentialité',
                    'Câbles robustes pour environnements industriels',
                ],
                'image' => 'images/industriel.jpg',
                'sort_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
