<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Profil;

class PeminjamanOfficeController extends Controller
{
    //
    public function peminjaman()
    {
        $data_detail = Peminjaman::all();
        $peminjaman = Peminjaman::all();
        return view('office/peminjaman/peminjaman', compact('peminjaman', 'data_detail'));
    }

    public function searchBydate(Request $request)
    {
        $peminjaman = Peminjaman::where('tglPinjam', '>=', $request->start)->where('tglPinjam', '<=', $request->end)->get();
        // dd($request->peminjaman);
        return view('office/peminjaman/peminjaman', compact('peminjaman'));
    }
    
    public function detailpeminjaman($no_peminjaman)
    {
        $data_detail = DetailPeminjaman::where('no_peminjaman', $no_peminjaman)->get();
        $peminjaman = Peminjaman::where('no_peminjaman', $no_peminjaman)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        return view('office/peminjaman/detail', compact('peminjaman', 'data_detail', 'profil'));
    }
}
