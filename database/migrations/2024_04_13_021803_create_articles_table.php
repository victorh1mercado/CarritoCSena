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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCategory');
            $table->string('code', 50)->nullable();
            $table->string('name', 100)->unique();
            $table->decimal('Sale_Price', 11, 2);
            $table->integer('stock');
            $table->string('description', 256)->nullable();
            $table->boolean('state')->default(1);
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
