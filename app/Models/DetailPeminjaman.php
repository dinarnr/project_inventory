<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table = "detail_peminjaman";
    protected $primaryKey = "id_peminjaman";
    protected $fillable = ['id_peminjaman','no_peminjaman','nama_barang','kode_barang', 'jumlah','jumlah_kembali','keterangan','status','konfirmasi'
                            ,'created_at'];
                        
}
