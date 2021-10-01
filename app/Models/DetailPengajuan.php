<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengajuan extends Model
{
    use HasFactory;
    protected $table = "detail_pengajuan";
    protected $primaryKey = "id_detailPengajuan";
    protected $fillable = ['id_pengajuan','kode', 'noPO','no_pengajuan','namaBarang', 'harga','jenisBarang','jmlBarang','keterangan','created_at'];


    public function detail_pengajuan()
    {
        return $this->hasMany(detail_pengajuan::class);
    }
}
