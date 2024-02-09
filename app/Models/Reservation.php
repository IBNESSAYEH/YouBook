<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['quantite', 'user_id', 'date_rec'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
