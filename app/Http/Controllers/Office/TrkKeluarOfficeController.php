<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\DetailTrkKeluar;
use App\Models\Profil;
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
        return view('office/barang/transaksikeluar', compact('transaksi_garansi', 'transaksi_instalasi', 'transaksi_retur'));
    }

    public function detailkeluargaransi($no_transaksi)
    {
        $profil= Profil::all();
        $data_detail = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('office/barang/detailkeluargaransi', compact('transaksi_masuk', 'data_detail', 'profil'));
    }
    public function detailkeluarinstalasi($no_transaksi)
    {
        $profil= Profil::all();
        $data_detail = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('office/barang/detailkeluarinstalasi', compact('transaksi_masuk', 'data_detail', 'profil'));
    }
    public function detailkeluarretur($no_transaksi)
    {
        $profil= Profil::all();
        $data_detail = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('office/barang/detailkeluarretur', compact('transaksi_masuk', 'data_detail', 'profil'));
    }
}
