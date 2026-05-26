<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('queue_number', 20)->unique();
            $table->string('owner_name');
            $table->string('email');
            $table->string('pet_type');
            $table->text('notes')->nullable();
            $table->enum('service', ['grooming', 'vet']);
            $table->enum('status', ['waiting', 'serving', 'done', 'skipped'])->default('waiting');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
