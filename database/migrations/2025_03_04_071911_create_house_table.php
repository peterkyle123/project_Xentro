<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id(); // house_id (Primary Key)
            $table->decimal('house_price', 10, 2); // House price
            $table->decimal('house_area', 10, 2); // House area in sq meters
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
