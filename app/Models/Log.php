<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = "log_system";
    protected $primaryKey = "id_log";
    protected $fillable = ['id_log', 'name','email','deskripsi','divisi','status','ip','created_at','updated_at'];
}
