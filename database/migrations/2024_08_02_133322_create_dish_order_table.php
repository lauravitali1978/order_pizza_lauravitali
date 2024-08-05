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
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordine_id');
            $table->unsignedBigInteger('piatto_id');
            $table->foreign('ordine_id')->references('id')->on('ordini');
            $table->foreign('piatto_id')->references('id')->on('piatti');
            $table->integer('quantita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_order');
    }
};
