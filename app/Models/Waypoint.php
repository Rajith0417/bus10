<?php

namespace App\Models;

use App\Models\District;
use App\Models\Road;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'level', 'lng', 'lat', 'district_id', 'show', 'parent_id'];
    public $timestamps = true;

    public function roads() {
        return $this->belongsToMany('App\Models\Road', 'roads_waypoints', 'waypoint_id', 'road_id');
    }

    public function district(){
        return $this->hasOne("App\Models\District","id", 'district_id');
    }

    public function children(){
        return $this->hasMany('App\Models\Waypoint', 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\Models\Waypoint', 'parent_id');
    }
}
