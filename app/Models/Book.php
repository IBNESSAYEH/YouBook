<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ["title", "prix" , "date_res" , "date_rec"];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
