<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ["name", "code", "flag_image", "points", "rank"];
}
