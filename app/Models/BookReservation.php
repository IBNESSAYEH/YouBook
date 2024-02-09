<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReservation extends Model
{
    use HasFactory;
    protected $table = "book_reservation";
    protected $fillable = ['book_id', 'reservation_id'];

}
