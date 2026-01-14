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
        Schema::create('refutes', function (Blueprint $table) {
            $table->id()->primary();;
            $table->foreignId('family_member_id');
            $table->foreignId('person_id');
            $table->string('note');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('family_member_id')->references('id')->on('family_members');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refutes');
    }
};
