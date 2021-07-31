<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => rand(1,50),
            'content' => $this->faker->text(100),
            'thread_id' => rand(1,7),
            'updatedByUser_id' => NULL,
        ];
    }
}
