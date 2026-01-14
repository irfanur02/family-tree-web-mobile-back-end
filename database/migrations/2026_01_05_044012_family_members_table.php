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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('family_id');
            $table->foreignId('person_id');
            $table->enum('role', ['suami', 'istri', 'anak']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('family_id')->references('id')->on('families');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
