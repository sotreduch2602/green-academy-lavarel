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
        Schema::table('product', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('product', 'product_category_id')) {
                $table->unsignedBigInteger('product_category_id')->nullable()->after('id');
            }
            $table->foreign('product_category_id')->references('id')->on('product_categpry_test');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
};
