<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id(); // house_id (Primary Key)
            $table->unsignedBigInteger('id'); // Foreign key to link with subdivisions
            $table->decimal('house_price', 10, 2); // House price
            $table->decimal('house_area', 10, 2); // House area in sq meters
            $table->timestamps();

            $table->foreign('id')->references('id')->on('subdivisions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
