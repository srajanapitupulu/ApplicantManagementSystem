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
            // applicant journey/state for dashboard tracking
            $table->string('status')->default('email_sent'); // email_sent | under_review | submitted
            // portal state persistence
            $table->unsignedTinyInteger('current_stage')->default(1); // 1=welcome, 2=instructions, 3=submission, 4=confirmation
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
