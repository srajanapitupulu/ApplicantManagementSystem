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
            'status' => 'email_sent',
            'stage' => 'welcome',
            'portal_token' => $this->faker->uuid,
        ];
    }
}
