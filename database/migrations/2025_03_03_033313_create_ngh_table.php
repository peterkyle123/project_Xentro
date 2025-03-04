<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ngh', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('sub_name')->nullable();  // sudivision name
            $table->decimal('price', 10, 2)->nullable();  // Price range
            $table->string('image')->nullable();  // Image path

            // Newly Added Columns
            $table->string('block_number');  // Block Number
            $table->decimal('block_area', 8, 2);  // Block Area (sq meters)
            $table->string('house_number');  // House Number
            $table->decimal('house_area', 8, 2);  // House Area (sq meters)
            $table->string('house_status')->default('Available');  // Status of the area (e.g., Available, Sold, Reserved)

            $table->timestamps();  // Created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ngh');
    }
};