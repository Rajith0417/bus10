<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'level', 'lng', 'lat', 'district_id', 'show', 'parent_id'];
    public $timestamps = true;
}
