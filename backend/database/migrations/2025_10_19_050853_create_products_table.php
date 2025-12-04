<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity_available')->default(0);
            $table->string('brand');
            $table->string('category');
            $table->string('sku')->unique()->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->index(['name', 'brand', 'category']);
            $table->index(['price']); 
            $table->index(['is_available']);
            // $table->fullText(['name', 'description', 'brand']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
