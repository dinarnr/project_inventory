<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailPO extends Model
{
    use HasFactory;
    protected $table = "detail_po";
    protected $primaryKey = "id_po";
    protected $fillable = [
        'id_po', 'no_PO', 'no_SO',  'nama_barang', 'kode_barang', 'jumlah', 'keterangan','rate','amount','keterangan_barang','instansi', 'status', 'created_at'
    ];


    public function detailpo($id_po)
    {
        return DB::table('detail_po')->where('id_po', $id_po)->first();
    }
}
