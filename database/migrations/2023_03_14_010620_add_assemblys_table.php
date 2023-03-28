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
        Schema::create('assemblies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bike_id');
            $table->foreign('bike_id')->references('id')->on('bikes');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assemblys');
    }
};
