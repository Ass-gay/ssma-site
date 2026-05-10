<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'type' => $this->faker->randomElement(['image', 'video']),
        'file' => 'media/' . $this->faker->uuid . '.jpg',
        'event_id' => null,
        'user_id' => null,
    ];
    }
}
