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
            /*
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('time_difference')->default(2);
            $table->dateTime('last_login')->nullable(true)->change();
            $table->integer('share_mode')->default(0);
            $table->integer('hide_share_user')->nullable(true)->change();
            $table->integer('authority')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            */
            //$table->bigIncrements('user_id');
            //$table->string('name');
            //$table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->integer('hide_share_user')->nullable(true)->change();
           // $table->string('password');
            //$table->rememberToken();
            //$table->integer('time_difference')->default(2);
            //$table->integer('share_mode')->default(0);
            //$table->integer('authority')->default(0);
            //$table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('last_login')->nullable(false)->change();
            $table->integer('hide_share_user')->nullable(false)->change();
        });
    }
};
