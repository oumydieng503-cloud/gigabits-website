<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Talla DIENG',
                'role' => 'Technicien',
                'photo' => 'images/image1.jpeg',
                'bio' => 'Spécialiste en installation et maintenance de systèmes technologiques.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Pape Dame THIAM',
                'role' => 'Technicien',
                'photo' => 'images/image2.jpeg',
                'bio' => 'Expert en réseaux télécom et solutions de connectivité.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Équipe GIGABITS',
                'role' => 'Techniciens certifiés',
                'photo' => 'images/image6.jpeg',
                'bio' => 'Une équipe mobile, réactive et professionnelle sur tout le territoire dakarois.',
                'sort_order' => 3,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
