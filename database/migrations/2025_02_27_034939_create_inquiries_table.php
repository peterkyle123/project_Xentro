<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('listing_id')->nullable(); // Changed to listing_id
            $table->timestamps();
        });

        Schema::table('inquiries', function (Blueprint $table) {
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('SET NULL'); // Updated reference
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};