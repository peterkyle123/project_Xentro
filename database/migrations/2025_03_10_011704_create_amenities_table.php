<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subdivision_id');
            $table->string('name'); // Amenity name (e.g., "Pool")
            $table->timestamps();

            $table->foreign('subdivision_id')->references('id')->on('ngh')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('amenities');
    }
};
