<?php

namespace Database\Factories;

use App\Models\Touchpoint;
use Illuminate\Database\Eloquent\Factories\Factory;

class TouchpointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Touchpoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => substr($this->faker->sentence(2), 0, -1),
            'content' => $this->faker->paragraph,
        ];
    }
}
