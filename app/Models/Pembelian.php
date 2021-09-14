<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    protected $primaryKey = "id_pembelian";
    protected $fillable = ['id_pembelian', 'no_PO','namaBarang','tglBeli','harga','supplier','jumlah','sisaBayar', 'totalBayar'
                            , 'status','created_at','updated_at'];
}
