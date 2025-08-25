<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            $table->enum('status', ['email_sent', 'under_review', 'submitted'])->default('email_sent');
            $table->enum('stage', ['welcome', 'instructions', 'submission', 'confirmation'])->default('welcome');

            $table->timestamp('timer_started_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('extended_until')->nullable();
            $table->timestamp('submitted_at')->nullable();

            // unique token to generate applicant-specific URL
            $table->uuid('portal_token')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
