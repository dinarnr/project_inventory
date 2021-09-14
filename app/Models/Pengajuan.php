<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $primaryKey = "id_pengajuan";
    protected $fillable = ['id_pengajuan','kode', 'noPO','judul','jumlah', 'status','tgl_pengajuan','jenisBarang','keterangan', 'pic_teknisi'
                            , 'pic_marketing','pic_warehouse','created_at'];
                            

    public function pengajuan()
    {
        return $this->hasMany(pengajuan::class);
    }

    public function editBaru($id_pengajuan, $data_baru)
    {
        DB::table('pengajuan')
            ->where('id_pengajuan', $id_pengajuan)
            ->update($data_baru);
    }
}
