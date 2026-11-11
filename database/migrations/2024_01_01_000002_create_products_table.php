<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('link')->nullable();
            $table->string('image_link');
            $table->string('additional_image_link')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('currency', 10)->default('XOF');
            $table->enum('availability', ['in_stock', 'out_of_stock', 'preorder'])->default('in_stock');
            $table->string('brand')->nullable();
            $table->string('gtin', 50)->nullable();
            $table->string('mpn', 70)->nullable();
            $table->enum('condition', ['new', 'used', 'refurbished'])->default('new');
            $table->string('google_product_category')->nullable();
            $table->string('product_type')->nullable();
            $table->string('shipping_country', 10)->nullable()->default('CI');
            $table->string('shipping_service')->nullable();
            $table->decimal('shipping_price', 10, 2)->default(0);
            $table->enum('identifier_exists', ['yes', 'no'])->default('yes');
            $table->boolean('is_digital')->default(false);
            $table->integer('stock')->default(100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
