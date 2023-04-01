<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('date');
            $table->integer('total_feeling');
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
