<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stoks';
    protected $fillable = [
        'namaBarang',
        'hargaBeli',
        'hargaJual',
        'fotoBarang',
        'stok',
    ];
}
