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
            $table->id(); // Primary key
            $table->string('product_name')->nullable(); // Product name
            $table->text('description')->nullable(); // Product description
            $table->string('category')->nullable(); // Product category
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable(); // Quantity available
            $table->decimal('price', 8, 2)->nullable(); // Price with 8 digits in total, 2 of them after the decimal point
            $table->string('image')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable(); // Image path or URL
            $table->timestamps();
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
