<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;
    protected $table = "detail_pembelian";
    protected $primaryKey = "id_pembelian";
    protected $fillable = ['id_pembelian', 'no_pengajuan','namaBarang','harga','jmlBarang','totalBeli','jenisTransaksi','info','harga_beli','amount','supplier'
                            ,'created_at','updated_at'];
}
