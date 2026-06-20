<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('today_prices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fish_id');
            $table->unsignedBigInteger('vendor_id');

            $table->decimal('vendor_price', 8, 2);
            $table->decimal('selling_price', 8, 2);

            $table->date('date'); // important for daily pricing

            $table->timestamps();

            // Foreign keys
            $table->foreign('fish_id')->references('id')->on('fishes')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

            // Prevent duplicate price for same fish + vendor + day
            $table->unique(['fish_id', 'vendor_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('today_prices');
    }
};
