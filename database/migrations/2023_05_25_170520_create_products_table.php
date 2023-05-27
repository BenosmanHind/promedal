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
            $table->id();
            $table->integer('productable_id');
            $table->string('productable_type');
            $table->string('designation');
            $table->longText('description')->nullable();
            $table->string('code');
            $table->integer('conditionnement');
            $table->string('IV')->nullable();
            $table->string('link_image')->nullable();
            $table->float('pu');
            $table->string('slug')->nullable();
            $table->tinyInteger('flag')->nullable();
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
