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
        Schema::create('film_organization_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("film_id");
            $table->foreignId("organization_id");
            $table->foreignId("role_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_organization_roles');
    }
};
