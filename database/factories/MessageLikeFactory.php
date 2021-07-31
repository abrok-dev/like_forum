<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\MessageLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageLikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageLike::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_id' => rand(1,25),
            'user_id' => rand(1,50),
        ];
    }
}
