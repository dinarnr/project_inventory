<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = "master_data"; 
    protected $primaryKey = "id_master";

    protected $fillable = ['id_master', 'kode_barang', 'kode_kategori','nama_barang', 'stok', 'gambar','status'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
