<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\PO;
use App\Models\Profil;
use Illuminate\Http\Request;

class PembelianOfficeController extends Controller
{
    //
    public function pembelian()
    {
        $lunas = Pembelian::all()->where('status','1');
        $hutang = DetailPembelian::all()->where('jenisTransaksi','','angsuran');
        return view('office/pembelian/pembelian', compact('lunas','hutang'));
    }
    public function detaillunas($no_pengajuan)
    {
        $lunas = DetailPembelian::where([

            ['no_pengajuan', $no_pengajuan],
    
            ['jenisTransaksi', '!=', 'angsuran']
    
        ])->get();
        $pembelian = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        // dd($pembelian);
        return view('office/pembelian/detaillunas', compact('pembelian', 'lunas', 'profil'));
    }

    public function hutang()
    {
    
        $data_detail = DetailPembelian::all()->where('jenisTransaksi','','angsuran');
       
        $profil = Profil::all();
        // dd($no_pengajuan);
        return view('office/pembelian/detailhutang', compact('data_detail', 'profil'));

    }
}

