<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Models\DetailTrkMasuk;
use App\Models\Profil;
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

    public function detailmasuk($no_transaksi)
    {
        $profil = Profil::all();
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('office/barang/detailmasukbaru', compact('transaksi_masuk', 'data_detail', 'profil'));
    }

    public function detailmasukretur($no_transaksi)
    {
        $profil = Profil::all();
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_retur = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('/office/barang/detailmasukretur', compact('transaksi_retur', 'data_detail', 'profil'));
    }
}
