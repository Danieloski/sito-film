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
        Schema::table('people', function (Blueprint $table) {
            $table->string('birthplace')->nullable();
            $table->string('deathplace')->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('birthplace');
            $table->dropColumn('deathplace');
            $table->dropColumn('sex');
        });
    }
};
