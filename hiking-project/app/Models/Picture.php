<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'hike_id',
        'image_path',
    ];

    public function hike()
    {
        return $this->belongsTo(Hike::class);
    }

}
