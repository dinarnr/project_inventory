<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
   
    public function detailstok($kode_barang){
        
        $data_stok = Stok::where('kode_barang', $kode_barang)->get();

        return view('warehouse/master/data_stok', compact('data_stok'));

    }
}
