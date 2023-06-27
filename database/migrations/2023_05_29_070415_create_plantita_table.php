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
        Schema::create('plantita', function (Blueprint $table) {
            $table->id('itemno');
            $table->string('itemdesc')->collation('utf8mb4_general_ci');
            $table->float('itemprice');
            $table->unsignedBigInteger('regno');
            $table->foreign('regno')->references('regno')->on('users');
            $table->text('img')->collation('utf8mb4_general_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantita');
    }
};
