<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('houses', function (Blueprint $table) {
            $table->unsignedBigInteger('block_id')->nullable(false)->change();
        });
    }

    public function down() {
        Schema::table('houses', function (Blueprint $table) {
            $table->unsignedBigInteger('block_id')->nullable()->change();
        });
    }
};
