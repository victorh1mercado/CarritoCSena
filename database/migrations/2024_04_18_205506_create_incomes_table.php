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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('user_id');
            $table->string('receipt_type', 20);
            $table->string('receipt_series', 7)->nullable();
            $table->string('receipt_number', 10);
            $table->dateTime('date');
            $table->decimal('tax', 4, 2);
            $table->decimal('total', 11, 2);
            $table->string('status', 20);
            $table->foreign('provider_id')->references('id')->on('people');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
