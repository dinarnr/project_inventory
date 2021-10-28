<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = "stok";
    protected $primaryKey = "id_stok";
    protected $fillable = ['id_stok', 'nama_barang','stok','stok_akhir','keterangan','kode_barang','created_at','updated_at'];
}
