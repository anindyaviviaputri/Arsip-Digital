<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'address',
        'contact',
        'send_date',
        'description',
    ];
    
}
