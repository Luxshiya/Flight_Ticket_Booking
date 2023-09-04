<?php

namespace Database\Factories;

use App\Models\Flight;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'flight_number' => $this->faker->unique()->randomNumber(),
            'departure_airport' => $this->faker->city,
            'destination_airport' => $this->faker->city,
            'departure_time' => Carbon::now()->addDays($this->faker->numberBetween(1, 30))->format('Y-m-d H:i:s'),
            'arrival_time' => Carbon::now()->addDays($this->faker->numberBetween(31, 60))->format('Y-m-d H:i:s'), // Provide a value for arrival_time
            'available_seats' => $this->faker->numberBetween(50, 200),
            'ticket_price' => $this->faker->randomFloat(2, 100, 1000), // Provide a value for ticket_price
            // Add other flight attributes as needed
        ];
    }
}
