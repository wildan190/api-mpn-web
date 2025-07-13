<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $feedbacks = [
            [
                'name' => 'Rina Wijaya',
                'email' => 'rina@example.com',
                'rate' => 5,
                'description' => 'Solusi IT yang sangat membantu. Layanan cepat dan profesional!',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'rate' => 4,
                'description' => 'Sangat puas dengan sistem IoT yang ditawarkan. Tim support sangat responsif.',
            ],
            [
                'name' => 'Sari Anggraini',
                'email' => 'sari@example.com',
                'rate' => 5,
                'description' => 'Transformasi digital berjalan lancar berkat Micro Padma Nusantara!',
            ],
            [
                'name' => 'Agus Ramadhan',
                'email' => 'agus@example.com',
                'rate' => 3,
                'description' => 'Solusinya bagus tapi butuh penyesuaian lebih untuk sektor manufaktur.',
            ],
            [
                'name' => 'Dewi Kartika',
                'email' => 'dewi@example.com',
                'rate' => 4,
                'description' => 'Integrasi AI sangat bermanfaat untuk analisis data bisnis kami.',
            ],
        ];

        Feedback::insert($feedbacks);
    }
}
