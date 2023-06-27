<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    protected $table = 'masuk'; 
    protected $fillable = [ 
        'stok',
        'jumlah',
        'kategori',
    ];
}
