<?php

namespace Database\Seeders;

use App\Models\MessageLike;
use Illuminate\Database\Seeder;

class MessageLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageLike::factory(15)->create();
    }
}
