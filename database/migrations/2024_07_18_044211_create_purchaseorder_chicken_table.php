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
        Schema::create('purchaseorder_chickens', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->date('date_requested');
            $table->date('date_needed');
            $table->string('number_of_items');
            $table->string('quantity_unit');
            $table->string('particulars');
            $table->string('unit_price');
            $table->string('amount');
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
        Schema::dropIfExists('purchaseorder_chickens');
    }
};
