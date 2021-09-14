<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiKeluar extends Model
{
    use HasFactory;
    protected $table = "transaksi_keluar";
    protected $primaryKey = "id_transaksi";
    // public $incrementing = false;

    protected $fillable = [
        'id_transaksi', 'no_transaksi', 'no_PO','tgl_transaksi','jns_transaksi', 'instansi',  'ekspedisi',  
        'pengirim', 'pic_teknisi', 'pic_teknisi', 'pic_marketing', 'pic_warehouse', 'created_at', 'updated_at'
    ];

}
