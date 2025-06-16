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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->double('price');
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->unsignedBigInteger('image');
            $table->foreign('image')->references('image_id')->on('image');
            $table->tinyInteger('active')->default(1);
            $table->integer('p_order')->unsigned()->unique();
            $table->tinyInteger('display')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
