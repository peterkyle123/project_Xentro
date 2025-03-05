<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->foreignId('subdivision_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropForeign(['subdivision_id']);
            $table->dropColumn('subdivision_id');
        });
    }
};
