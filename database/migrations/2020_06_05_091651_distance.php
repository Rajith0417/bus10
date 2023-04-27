<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Distance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->unsignedInteger('from');
            $table->primary('from');
            $table->unsignedInteger('to');
            $table->primary('to');
            $table->integer('from_district');
            $table->integer('to_district');
            $table->integer('distance');
            $table->float('distance')->nullable()->default(0.05);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distances');
    }
}
