<?php

namespace Database\Factories;

use App\Models\Membre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Membre>
 */
class MembreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'sexe' => fake()->randomElement(['homme', 'femme']),
            'date_naissance' => fake()->date(),
            'lieu_naissance' => fake()->city(),
            'adresse' => fake()->address(),
            'profession' => fake()->jobTitle(),
            'telephone' => fake()->phoneNumber(),
            'photo' => 'membre.jpg',
            'status' => fake()->randomElement(['en_attente', 'accepte']),
        ];
    }
}
