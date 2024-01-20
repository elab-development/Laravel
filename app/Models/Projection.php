<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    use HasFactory;
    protected $fillable=['price','air_date','movie_id','hall_id'];

    protected $casts = [
        'air_date' => 'datetime',
    ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    
}
