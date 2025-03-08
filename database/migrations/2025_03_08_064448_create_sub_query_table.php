<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_query', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->string('purpose');
            $table->string('lot');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_query');
    }
};
