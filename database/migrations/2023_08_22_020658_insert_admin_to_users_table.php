<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->insert([
            'name'              => 'Admin',
            'email'             => 'admin@admin.com',
            'password'          => '$2y$10$f2cQ159P5m.MHQJC0EtwhehIXvAe/eTjmifvwwI7bncPmzLSfdZzm',
            'role_id'           => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
