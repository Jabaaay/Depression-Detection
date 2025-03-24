<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('college');
            $table->string('course');
            $table->integer('age');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->boolean('accepted_terms')->default(false);
            $table->enum('status', ['On Going', 'Tested'])->default('On GOing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
