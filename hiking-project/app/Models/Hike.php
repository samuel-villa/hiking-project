<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'distance',
        'duration',
        'elevation_gain',
        'description',
        'user_id'
    ];
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
