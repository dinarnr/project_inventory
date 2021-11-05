<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    protected $primaryKey = "id_pembelian";
    protected $fillable = ['id_pembelian', 'no_pengajuan','nama_pemohon','tgl_pengajuan','pic_teknisi','pic_marketing','pic_warehouse','pic_admin', 'pic_purchasing'
                           ,'status','created_at','updated_at'];
}
