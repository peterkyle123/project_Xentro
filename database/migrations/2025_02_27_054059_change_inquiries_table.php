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
            // Drop any existing foreign key on listing_id (if it exists)
            $foreignKeys = array_map(function ($foreignKey) {
                return $foreignKey->Key_name;
            }, \DB::select('SHOW KEYS FROM inquiries WHERE Key_name LIKE "inquiries_listing_id_foreign%"'));

            foreach ($foreignKeys as $foreignKey) {
                $table->dropForeign($foreignKey);
            }

            // Add the correct foreign key constraint
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            // Drop any existing foreign key on listing_id (if it exists)
            $foreignKeys = array_map(function ($foreignKey) {
                return $foreignKey->Key_name;
            }, \DB::select('SHOW KEYS FROM inquiries WHERE Key_name LIKE "inquiries_listing_id_foreign%"'));

            foreach ($foreignKeys as $foreignKey) {
                $table->dropForeign($foreignKey);
            }

            // Add the correct foreign key constraint
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('SET NULL');
        });
    }
};