<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\TransaksiKeluar;

use Illuminate\Http\Request;

class TrkKeluarOfficeController extends Controller
{
    //
    public function transaksikeluar()
    {
        $transaksi_garansi = TransaksiKeluar::all()->where('jns_barang', '', 'garansi');
        $transaksi_instalasi = TransaksiKeluar::all()->where('jns_barang', '', 'instalasi');
        $transaksi_retur = TransaksiKeluar::all()->where('jns_barang', '', '');
        return view('warehouse/transaksi/transaksikeluar', compact('transaksi_garansi', 'transaksi_instalasi', 'transaksi_retur'));
    }
}
