<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Models\TransaksiKeluar;

use Illuminate\Http\Request;

class TrkOfficeController extends Controller
{
    //
    public function transaksi()
    {
        $transaksi_masuk = TransaksiModel::all();
        $transaksi_keluar = TransaksiKeluar::all();
        return view('office/barang/transaksi', compact('transaksi_masuk', 'transaksi_keluar'));
    }
}
