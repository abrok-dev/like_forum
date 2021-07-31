<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_id' => rand(1,25),
            'reason' => $this->faker->word(),
            'reportedByUser_id' => rand(1,50),
            'treatedAt' => NULL,
            'treatedByUser_id' => NULL,
        ];
    }
}
