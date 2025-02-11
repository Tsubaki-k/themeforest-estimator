<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estimate_by_custom_data', function ( Blueprint $table ) {
            $table->id();
            $table->string('key')->unique();
            $table->bigInteger('sells');
            $table->bigInteger('price');
            $table->string('price_currency');
            $table->bigInteger('second_price')->nullable();
            $table->string('second_price_currency')->nullable();
            $table->dateTime('publish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_by_custom_data');
    }
};
