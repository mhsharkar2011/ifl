<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $owners = User::where('role','Owner')->get();
        // $vehicle_types = VehicleType::all();
                return [
                    'name' => $this->faker->unique()->randomElement([
                        "Desktop",
                        "Laptop",
                        "Component",
                        "Monitor",
                        "UPS",
                        "Office Equipment",
                        "Camera",
                        "Networking",
                        "Software",
                        "Server & Storage",
                        "Accessories",
                        "TV",
                        "Appliance",
                    ]),
                ];
    }
}
