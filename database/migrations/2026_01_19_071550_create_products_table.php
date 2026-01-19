<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // each Columns for products
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->foreignId('category_id')->constrained(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};