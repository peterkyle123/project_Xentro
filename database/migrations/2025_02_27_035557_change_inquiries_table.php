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
        Schema::table('inquiries', function (Blueprint $table) {
            $table->renameColumn('property_id', 'listing_id');
            $table->dropForeign(['inquiries_property_id_foreign']);
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->renameColumn('listing_id', 'property_id');
            $table->dropForeign(['inquiries_listing_id_foreign']);
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('SET NULL');
        });
    }
};