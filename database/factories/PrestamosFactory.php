<?php

namespace Database\Factories;

use App\Models\Prestamos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamosFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prestamos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 500),
            'client_id' => $this->faker->numberBetween(1, 6),
            'loan_date' => $this->faker->dateTimeBetween('-3 years', '-1 week'),
            'loan_days' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->randomElement(['En Prestamo', 'Devuelto']),
        ];
    }
}