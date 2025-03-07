<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('ngh', function (Blueprint $table) {
        $table->integer('block_number')->nullable()->change();
        $table->integer('house_number')->nullable()->change();
    });
}

public function down()
{
    Schema::table('ngh', function (Blueprint $table) {
        $table->string('block_number', 255)->nullable()->change();
        $table->string('house_number', 255)->nullable()->change();
    });
}
};
