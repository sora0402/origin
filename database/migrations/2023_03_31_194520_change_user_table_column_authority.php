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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('hide_share_user', 'hide_share_mode');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('hide_share_mode')->default('0')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
