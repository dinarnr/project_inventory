<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Master;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokOfficeController extends Controller
{
    public function stok()
    {
        // $data_stok = Master::all();
        $data_stok = Master::all();
        return view('office/barang/stok', compact('data_stok'));
    }

    public function history_stok($kode_barang)
    {
        $data_stok = Stok::where('kode_barang', $kode_barang)->get();
        $master_stok = Master::where('kode_barang', $kode_barang)->get();
        return view('office/barang/history_stok', compact('data_stok', 'master_stok'));
    }
}
