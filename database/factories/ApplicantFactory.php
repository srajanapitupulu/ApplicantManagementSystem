<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

class ApplicantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'task_id' => Task::inRandomOrder()->first()?->id ?? Task::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->randomElement(['email_sent', 'under_review', 'submitted']),
            'stage' => $this->faker->randomElement(['welcome', 'instructions', 'submission', 'confirmation']),
            'portal_token' => $this->faker->uuid,
        ];
    }
}
