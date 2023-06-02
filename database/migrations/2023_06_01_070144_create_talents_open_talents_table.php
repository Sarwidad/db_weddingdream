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
        Schema::create('talent_open_talents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('open_talents_id')->unsigned();
            $table->unsignedBigInteger('talent_id')->unsigned();

            $table->foreign('open_talents_id')->references('id')->on('open_talents')->onDelete('cascade');
            $table->foreign('talent_id')->references('id')->on('talent')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent_open_talents');
    }
};
