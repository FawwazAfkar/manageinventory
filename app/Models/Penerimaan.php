<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $fillable = ['id_barang', 'jumlah', 'tanggal'];
    use HasFactory;
}
