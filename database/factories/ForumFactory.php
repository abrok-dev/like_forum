<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Forum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $word=$this->faker->word();
        return [
            'title' => $word,
            'slug'=> Str::slug($word),
            'description' => $this->faker->text(100),
            'category_id' => rand(1,2),
            'position' => rand(1,20),
            'isLock' => false,
        ];
    }
}
