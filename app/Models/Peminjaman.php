<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";
    protected $primaryKey = "id_peminjaman";

    protected $fillable = ['id_peminjaman','no_peminjaman', 'kebutuhan', 'pic_teknisi', 'pic_warehouse', 'tglPinjam', 'tglKembali', 'status'];
}
