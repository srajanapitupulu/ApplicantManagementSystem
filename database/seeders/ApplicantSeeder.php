<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Applicant;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applicant::factory()->count(10)->create();
    }
}
