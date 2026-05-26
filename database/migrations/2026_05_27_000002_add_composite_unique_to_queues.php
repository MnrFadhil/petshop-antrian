<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('queues', function (Blueprint $table) {
            $table->date('queue_date')->nullable()->after('queue_number');
        });

        // Isi queue_date dari created_at yang sudah ada
        \DB::statement("UPDATE queues SET queue_date = DATE(created_at)");

        Schema::table('queues', function (Blueprint $table) {
            $table->date('queue_date')->nullable(false)->change();
            $table->unique(['queue_number', 'queue_date'], 'queues_number_date_unique');
        });
    }

    public function down(): void
    {
        Schema::table('queues', function (Blueprint $table) {
            $table->dropUnique('queues_number_date_unique');
            $table->dropColumn('queue_date');
        });
    }
};
