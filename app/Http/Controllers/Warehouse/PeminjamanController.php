<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Log;
use App\Models\Peminjaman;
use App\Models\Profil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    //
    public function peminjaman()
    {
        $peminjaman = Peminjaman::all();
        return view('warehouse/peminjaman/peminjaman', compact('peminjaman'));
    }

   
    public function confirm(Request $request, $no_peminjaman)
    {
        // dd($request->no_peminjaman);
        $user = Auth::user();
        DetailPeminjaman::where('no_peminjaman', $no_peminjaman)
            ->update(
                [
                    'status' => '4',
                    'konfirmasi' => $request -> konfirmasi,

                ]
            );


        Peminjaman::where('no_peminjaman', $request->no_peminjaman)
            ->update(
                [
                    'status' => '4',
                    'konfirmasi' => $request -> konfirmasi,
                    'pic_warehouse' => $user->name,
                    'tglKembali' => Carbon::now()
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Pinjaman di Konfirmasi Warehouse',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('warehouse/peminjaman');
    }

    public function setuju(Request $request, $no_peminjaman)
    {
        // dd($request->non);
        $user = Auth::user();
        DetailPeminjaman::where('no_peminjaman', $no_peminjaman)
        ->update(
            [
                'status' => '2',
            ]
        );  
        Peminjaman::where('no_peminjaman', $request->no_peminjaman)
            ->update(
                [
                'status' => '2',
                    
                ]
            );
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Menyetujui peminjaman',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('warehouse/peminjaman');
    }
    public function kembali_barang(Request $request, $id_peminjaman)
    {
        // dd($request->non);
        DetailPeminjaman::where('id_peminjaman', $id_peminjaman)
        ->update(
            [
                'jumlah_kembali' => $request -> jumlah_kembali,
                'status' => '5',
            ]
        );  
        return redirect()->back();
    }

    public function detailpeminjaman($no_peminjaman)
    {
        $data_detail = DetailPeminjaman::where('no_peminjaman', $no_peminjaman)->get();
        $peminjaman = Peminjaman::where('no_peminjaman', $no_peminjaman)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        return view('warehouse/peminjaman/detail', compact('peminjaman', 'data_detail', 'profil'));
    }
}
