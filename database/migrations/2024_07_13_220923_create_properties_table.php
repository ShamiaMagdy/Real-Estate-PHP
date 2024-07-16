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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('location');
            $table->float('price');
            $table->string('area');
            $table->string('description');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garden');
            $table->integer('garage');
            $table->integer('pool');
            $table->integer('rentvssell')->comment('0 rent , 1 sell ');
            $table->foreignId('userID')->constrained('users');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
