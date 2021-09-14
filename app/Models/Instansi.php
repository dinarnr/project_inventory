<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = "data_instansi";
    protected $primaryKey = "id_instansi";

    protected $fillable = ['id_instansi', 'kode_instansi','nama_instansi', 'email_instansi', 'pic_instansi', 'alamat_instansi', 'telp_instansi'];
}
