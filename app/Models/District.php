<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = true;

    public function waypoints()
    {
        return $this->hasMany('App\Waypoint', 'district_id', 'id');
    }
}
