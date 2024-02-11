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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('category_id');
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
