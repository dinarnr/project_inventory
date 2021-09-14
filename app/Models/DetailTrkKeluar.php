<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTrkKeluar extends Model
{
    protected $table = "detail_transaksi_keluar";
    protected $primaryKey = "id_transaksi";
    protected $fillable = ['id_transaksi', 'no_PO', 'no_transaksi', 'kode_barang', 'nama_barang', 'tgl_transaksi', 'instansi', 'no_PO', 'nama_barang', 'instansi', 'jumlah', 'keterangan', 'created_at',	'updated_at'];
}

