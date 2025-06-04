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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('coin_symbol'); //z.b BTC/ETH
            $table->decimal('amount', 16, 8);       //Menge der Coins
            $table->decimal('buy_price', 16, 8);    //Kaufpreis pro Coin
            $table->decimal('target_price', 16, 8)->nullable(); //Zielverkaufspreis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
