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
        Schema::create('vaccunes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id'); 
            $table->string('name');
            $table->text('description');
            $table->integer('dose');
            $table->datetime('date');


            $table->timestamps();
            $table->foreign('animal_id')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccunes');
    }
};
