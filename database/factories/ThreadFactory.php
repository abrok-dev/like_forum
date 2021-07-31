<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $word =  $this->faker->word();
        return [
            
            'author_id' => rand(1,50),
            'title' => $word,
            'slug' => Str::slug($word),
            'forum_id' => rand(1,4),
            'isLock' => false,
            'isPin' => false,
            
        ];
    }
}
