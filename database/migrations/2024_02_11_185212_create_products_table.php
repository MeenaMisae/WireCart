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
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('category_id');
            $table->unsignedSmallInteger('subcategory_id');
            $table->unsignedDecimal('price', 9, 2);
            $table->string('name', 50);
            $table->text('description', 200)->nullable();
            $table->string('slug', 50);
            $table->string('image', 50)->nullable()->default(null);
            $table->boolean('on_sale')->default(false);
            $table->decimal('discount', 5, 2)->nullable();
            $table->unsignedSmallInteger('quantity');
            $table->boolean('in_stock')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('RESTRICT');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
