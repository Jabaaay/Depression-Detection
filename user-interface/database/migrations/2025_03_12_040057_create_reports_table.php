<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Test ID
            $table->string('full_name');
            $table->string('college');
            $table->string('course');
            $table->integer('age');
            $table->date('test_date')->nullable(); // Test Date
            $table->enum('result', ['Tested', 'Pending'])->default('Pending'); // Result
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
