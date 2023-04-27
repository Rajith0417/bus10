<?php

namespace App\Models;

use App\Models\Waypoint;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'distance', 'bidirection', 'outstation'];
    public $timestamps = true;

    public function waypoints() {
        return $this->belongsToMany('App\Models\Waypoint', 'roads_waypoints')->withPivot('road_id', 'waypoint_id','orderr')->withTimestamps()->orderBy('orderr');
    }

    public function waypointsUnique() {
        return $this->belongsToMany('App\Models\Waypoint', 'roads_waypoints_unique')->withPivot('road_id', 'waypoint_id','orderr')->withTimestamps()->orderBy('orderr');
    }

    public function waypointsByDistrict($id){
        return $this->belongsToMany('App\Models\Waypoint', 'roads_waypoints')->withPivot('road_id', 'waypoint_id','orderr')->where( 'district_id',$id);
    }

    public function waypointsByDistrictUnique($id){
        return $this->belongsToMany('App\Models\Waypoint', 'roads_waypoints_unique')->withPivot('road_id', 'waypoint_id','orderr')->where( 'district_id',$id);
    }
}
