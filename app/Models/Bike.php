<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'model',
        'tipo',
        'descripcion',
        'imagen',
        'price_per_hour',
        'status',
    ];

    // Una bici puede tener muchas reservas
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
