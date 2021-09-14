<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;

    protected $table = "data_supplier";
    protected $primaryKey = "id_supplier";

    protected $fillable = ['id_supplier', 'kode_supplier','nama_supplier', 'email_supplier', 'pic_supplier', 'alamat_supplier', 'telp_supplier'];
}
