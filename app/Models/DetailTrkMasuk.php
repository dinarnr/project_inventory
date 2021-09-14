<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTrkMasuk extends Model
{
    use HasFactory;

    protected $table = "detail_transaksi_masuk";
    protected $primaryKey = "id_transaksi";

    protected $fillable = [
        'id', 'no_transaksi', 'tgl_transaksi', 'kode_barang','nama_barang', 'no_PO', 'keterangan',  'jumlah', 'nama_supplier', 'instansi', 'pengirim', 'penerima',  'created_at', 'updated_at'
    ];
}
