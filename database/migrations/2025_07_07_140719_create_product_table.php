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
            $table->id()->autoIncrement()->unsigned();
            $table->string('name');
            $table->float('price', 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('shipping')->nullable();
            $table->float('weight', 2)->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('status')->default(0);
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
