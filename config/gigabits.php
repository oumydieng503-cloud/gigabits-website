<?php

return [
    'name' => 'GIGABITS SARL',
    'tagline' => 'Solutions technologiques fiables & durables pour les professionnels et les particuliers',
    'description' => 'Nous vous accompagnons avec des solutions sur mesure, performantes et sécurisées.',

    'phones' => [
        '77 967 61 61',
        '77 714 55 88',
        '77 487 72 57',
    ],

    'email' => 'gigabitssarl@gmail.com',
    'mail_to' => env('MAIL_CONTACT_TO', 'gigabitssarl@gmail.com'),
    'admin_password' => env('ADMIN_PASSWORD', ''),
    'location' => 'Dakar, Keur Massar',

    'whatsapp' => '221768016335',
    'facebook' => '#', // À mettre à jour quand la page Facebook sera créée
    'tiktok' => 'https://vm.tiktok.com/ZS9jcJw8Pfmg4-ZcJ2E/',

    'slogan' => 'Ensemble, construisons un avenir connecté et sécurisé.',

    'logo' => 'images/logo.png',

    /*
    |--------------------------------------------------------------------------
    | Chemins des images (dossier public/images/)
    |--------------------------------------------------------------------------
    */
    'images' => [
        'hero' => 'images/image6.jpeg',
        'team' => [
            'talla' => 'images/image1.jpeg',
            'uniformes' => 'images/image2.jpeg',
            'chantier' => 'images/image3.jpeg',
            'bureau' => 'images/image5.jpeg',
            'portail' => 'images/image6.jpeg',
        ],
        'heroes' => [
            'team' => [
                'src' => 'images/image6.jpeg',
                'focal' => 'center center',
            ],
            'services' => [
                'src' => 'images/image3.jpeg',
                'focal' => '42% center',
            ],
        ],
        'services' => [
            'cameras-surveillance' => 'images/cameras.jpg',
            'reseau-telecom' => 'images/reseau.jpg',
            'installation-domicile' => 'images/domicile.jpg',
            'panneaux-solaires' => 'images/solaire.jpg',
            'cablage-industriel' => 'images/industriel.jpg',
        ],
    ],

    'strengths' => [
        [
            'title' => 'Équipements de qualité professionnelle',
            'icon' => 'shield',
        ],
        [
            'title' => 'Service rapide et efficace',
            'icon' => 'bolt',
        ],
        [
            'title' => 'Sécurité et confidentialité garanties',
            'icon' => 'lock',
        ],
        [
            'title' => 'Support technique disponible',
            'icon' => 'headset',
        ],
    ],
];
