<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id(); // house_id (Primary Key)
            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade'); // Foreign Key for Block
            $table->decimal('house_price', 10, 2); // House price
            $table->decimal('house_area', 10, 2); // House area in sq meters
            $table->integer('assigned_house_number'); // House number within the block
            $table->timestamps();

            // Ensure unique house number per block
            $table->unique(['block_id', 'assigned_house_number']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
