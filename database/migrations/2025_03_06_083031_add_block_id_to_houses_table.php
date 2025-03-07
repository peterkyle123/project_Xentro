<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlockIdToHousesTable extends Migration
{
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->unsignedBigInteger('block_id')->nullable()->after('subdivision_id');
            // Optionally, if you have a blocks table you can add a foreign key constraint:
            // $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            // If you added a foreign key, drop it first:
            // $table->dropForeign(['block_id']);
            $table->dropColumn('block_id');
        });
    }
}
