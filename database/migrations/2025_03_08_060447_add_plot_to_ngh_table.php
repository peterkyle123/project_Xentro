<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlotToNghTable extends Migration // Correct class name
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ngh', function (Blueprint $table) {
            $table->string('plot')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ngh', function (Blueprint $table) {
            $table->dropColumn('plot');
        });
    }
}
