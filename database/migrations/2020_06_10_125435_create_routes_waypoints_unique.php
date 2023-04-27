<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesWaypointsUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads_waypoints_unique', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('road_id')->unsigned();
            $table->integer('waypoint_id')->unsigned();
            $table->integer("orderr");
            $table->timestamps();
        });

        Schema::table('roads_waypoints', function(Blueprint $table) {
            $table->foreign('road_id')->references('id')->on('roads')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('waypoint_id')->references('id')->on('waypoints')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes_waypoints_unique');
    }
}
