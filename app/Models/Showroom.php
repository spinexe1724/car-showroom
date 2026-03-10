<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = [
        'kdcab', 'inisial', 'nmdealer','cnm','ad1', 'ad2','kota', 
        'dlmou', 'dlmoutglfr', 'dlmoutglto', 'alamat', 'clprnoktp',
    ];
}
