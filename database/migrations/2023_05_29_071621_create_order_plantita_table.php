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
        Schema::create('order_plantita', function (Blueprint $table) {
            $table->id('transno');
            $table->unsignedBigInteger('itemno');
            $table->foreign('itemno')->references('itemno')->on('plantita');
            $table->unsignedBigInteger('orderno');
            $table->foreign('orderno')->references('orderno')->on('order');
            $table->integer('price');
            $table->string('status')->collation('utf8mb4_general_ci');
            $table->string('remarks')->nullable()->collation('utf8mb4_general_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_plantita');
    }
};
