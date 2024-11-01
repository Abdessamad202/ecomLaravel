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
            $table->id(); // Primary key for the product
            $table->string('name'); // Product name
            $table->integer('price'); // Product price
            $table->integer('discount'); // Discount on the product
    
            // Foreign key column for the 'categories' table
            // Delete related products if the category is deleted
    
            $table->text('description'); // Product description
            $table->string('image')->nullable(); // Allow image to be nullable if not always provided
            $table->timestamps(); // Created and updated timestamps
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
