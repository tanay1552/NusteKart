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
    Schema::create('vendor_fish_prices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('vendor_id')->constrained();
    $table->foreignId('fish_id')->constrained('fishes');
    $table->decimal('price_per_kg',8,2);
    $table->date('date');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_fish_prices');
    }
};
