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
        'trail_rank',
        'user_id'
    ];
    public function getShortDescriptionAttribute()
    {
        return strlen($this->description) > 200 ? substr($this->description, 0, 200) . '...' : $this->description;
    }
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
