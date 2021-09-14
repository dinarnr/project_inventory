<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jenis extends Model
{
    use HasFactory;

    protected $table = "data_jenis";
    protected $primaryKey = "id_jenis";
    protected $fillable = ['id_jenis', 'jenis_barang', 'keterangan'];

    public function master()
    {
        return $this->hasMany(Master::class);
    }
    

    public function editJenis($id_jenis, $data_jenis)
    {
        DB::table('data_jenis')
            ->where('id_jenis', $id_jenis)
            ->update($data_jenis);
    }
}
