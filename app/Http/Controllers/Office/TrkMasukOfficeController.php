<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class TrkMasukOfficeController extends Controller
{
    //
    public function transaksimasuk()
    {
        $transaksi_masuk = TransaksiModel::all()->where('instansi', '', '');
        $transaksi_retur = TransaksiModel::all()->where('nama_supplier', '', '');
        return view('office/barang/transaksimasuk', compact('transaksi_masuk', 'transaksi_retur'));
    }
}
