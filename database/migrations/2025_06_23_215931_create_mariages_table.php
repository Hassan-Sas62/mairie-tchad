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
    Schema::create('mariages', function (Blueprint $table) {
        $table->id();
        $table->string('nom_epoux');
        $table->string('nom_epouse');
        $table->date('date_mariage');
        $table->string('lieu_mariage');
        $table->string('telephone');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mariages');
    }
};
