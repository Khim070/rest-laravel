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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('image')->nullable();
            $table->foreign('image')->references('image_id')->on('image');
            $table->string('email', 255);
            $table->text('password');
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('role', 20)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
