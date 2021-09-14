<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "data_kategori";
    protected $primaryKey = "id_kategori";

    protected $fillable = ['id_kategori', 'kode_kategori', 'kategori', 'keterangan'];
}
