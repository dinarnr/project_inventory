<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    use HasFactory;
    protected $table = "purchase_order";
    protected $primaryKey = "id_PO";
    protected $fillable = ['id_PO','no_PO', 'tgl_pemasangan','instansi','status'
                            ,'pic_marketing','pic_warehouse','pic_admin','keterangan','created_at'];


    public function detail_pengajuan()
    {
        return $this->hasMany(detail_pengajuan::class);
    }
}

