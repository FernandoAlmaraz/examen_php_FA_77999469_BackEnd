<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'autor_id' => $this->faker->numberBetween(1, 6),
            'lot' => $this->faker->unique()->numberBetween(1, 10000),
            'description' => $this->faker->paragraph(),
            'genre' => $this->faker->unique()->numberBetween(1, 3),
        ];
    }
}
