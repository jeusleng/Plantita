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
        Schema::create('users', function (Blueprint $table) {
            $table->id('regno');
            $table->string('username');
            $table->date('birthday');
            $table->string('user_type');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('gcash_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
