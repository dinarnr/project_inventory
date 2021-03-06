<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Master;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
   
    public function detailstok($kode_barang){
        
        $data_stok = Stok::where('kode_barang', $kode_barang)->get();
        $master_stok = Master::where('kode_barang', $kode_barang)->get();

// dd($master_stok);
        return view('warehouse/master/data_stok', compact('data_stok', 'master_stok'));

    }
}
