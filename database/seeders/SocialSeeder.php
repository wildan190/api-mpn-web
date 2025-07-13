<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialSeeder extends Seeder
{
    public function run(): void
    {
        Social::create([
            'instagram_link' => 'https://instagram.com/micropadmanusantara',
            'facebook_link'  => 'https://facebook.com/micropadmanusantara',
            'youtube_link'   => 'https://www.youtube.com/channel/UCj5ARSJgxftMlrwuLt1ZVVg',
        ]);
    }
}
