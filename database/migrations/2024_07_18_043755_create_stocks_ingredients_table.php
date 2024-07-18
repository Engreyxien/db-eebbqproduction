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
        Schema::create('stocks_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('ingredients_name');
            $table->string('beginning_stocks');
            $table->string('dispatch_AM');
            $table->string('dispatch_PM');
            $table->string('ending_stocks');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_ingredients');
    }
};
