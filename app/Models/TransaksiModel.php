<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = "transaksi_masuk";
    protected $primaryKey = "id";
    // public $incrementing = false;

    protected $fillable = [
        'id', 'no_transaksi', 'tgl_transaksi', 'nama_barang', 'po', 'keterangan',  'jumlah', 'nama_supplier', 'instansi', 'pengirim', 'penerima',  'created_at', 'updated_at'
    ];

    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class);
    }

    
}
