<?php

namespace Database\Seeders;

use App\Models\ChatMeeting;
use App\Models\HiringRequest;
use App\Models\Message;
use App\Models\VoiceMeeting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Message::factory(50)->create();
        HiringRequest::factory(50)->create();
        ChatMeeting::factory(50)->create();
        VoiceMeeting::factory(50)->create();
    }
}
