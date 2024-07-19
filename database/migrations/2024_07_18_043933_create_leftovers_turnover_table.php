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
        Schema::create('leftovers_turnovers', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->date('date_received');
            $table->time('time_received');
            $table->string('item_number');
            $table->string('number_of_items');
            $table->string('quantity');
            $table->string('delivered_by');
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
        Schema::dropIfExists('leftovers_turnovers');
    }
};

