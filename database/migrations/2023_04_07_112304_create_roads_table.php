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
        Schema::create('roads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->string('number');
            // $table->decimal('lng', 10, 7);
            // $table->decimal('lat', 10, 7);
            // $table->integer('gps');
            $table->integer('price')->nullable();
            $table->double('distance',5,2)->nullable();
            // $table->integer('start')->unsigned();
            // $table->integer('end')->unsigned();
            $table->boolean('bidirection')->default(true);
            $table->boolean('outstation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roads');
    }
};
