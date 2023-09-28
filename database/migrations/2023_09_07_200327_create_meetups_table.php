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
        Schema::create('meetups', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->dateTime('time');
            $table->string('thumbnail')->nullable();
            $table->enum('category', ['static', 'cruise', 'club']);
            $table->unsignedBigInteger('organiser_id');
            $table->foreign('organiser_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetups');
    }
};
