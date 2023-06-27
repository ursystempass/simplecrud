<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_Keluar extends Model
{
    use HasFactory; 
    protected $table = 'stok_keluar'; 
    protected $fillable = [ 
    'nonota_keluar', 
    'tgl_keluar', 
    'total_keluar',
    'nama_barang'
    ];
}