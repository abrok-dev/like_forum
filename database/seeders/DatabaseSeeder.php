<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Forum;
use App\Models\Message;
use App\Models\MessageLike;
use App\Models\Report;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;

use function PHPUnit\Framework\callback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $user = User::factory()->count(4)
        // ->has(Message::factory()->count(3)
        // ->has(MessageLike::factory()->count(3)));
        
       

     //   $this->call(UserSeeder::class);
       // $this->call(CategorySeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(ThreadSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(MessageLikeSeeder::class);
        $this->call(ReportSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
