<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Membre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
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
            'email' => fake()->email(),
            'sujet' => fake()->sentence(),
            'message' => fake()->text(),
            'lu' => fake()->boolean(),
            'repondu' => fake()->boolean(),
            'reponse' => null,

            // optionnel (important)
            'membre_id' => fake()->boolean(50) ? Membre::factory() : null,
        ];
    }
}
