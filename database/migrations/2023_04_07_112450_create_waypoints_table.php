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
        Schema::create('waypoints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('level');
            $table->float('lng', 8, 5);
            $table->float('lat', 8, 5);
            $table->integer('district_id')->unsigned();
            $table->boolean('show')->default(true);
            $table->integer('parent_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waypoints');
    }
};
