<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->integer('assigned_house_number')->after('subdivision_id'); // New column
        });
    }

    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('assigned_house_number');
        });
    }
};