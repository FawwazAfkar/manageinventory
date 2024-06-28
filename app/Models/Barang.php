<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'deskripsi' , 'stok' , 'harga' , 'id_kategori' , 'id_supplier'];
    use HasFactory;
}
