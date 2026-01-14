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
        Schema::create('persons', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('account_id')->constrained(
                table: 'accounts',
                indexName: 'persons_account_id');
            $table->string('full_name')->nullable();
            $table->string('nick_name');
            $table->string('image')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('person_address', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('person_id')->constrained(
                table: 'persons',
                indexName: 'person_address_person_id');
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('person_telp', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('person_id')->constrained(
                table: 'persons',
                indexName: 'person_telp_person_id');
            $table->string('telp_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
        Schema::dropIfExists('person_address');
        Schema::dropIfExists('person_telp');
    }
};
