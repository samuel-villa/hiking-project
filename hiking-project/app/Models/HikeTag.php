<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HikeTag extends Model
{
    use HasFactory;

    protected $table = 'hikes__tags';

    protected $fillable = [
        'hike_id',
        'tag_id',
    ];
    public function hike()
    {
        return $this->belongsTo(Hike::class);
    }
}
