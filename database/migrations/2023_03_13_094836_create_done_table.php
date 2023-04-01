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
        Schema::create('done', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('diary_id');
            $table->integer('total_feeling');
            $table->string('body');
            $table->integer('assessment');
            $table->integer('display')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('done');
    }
};
