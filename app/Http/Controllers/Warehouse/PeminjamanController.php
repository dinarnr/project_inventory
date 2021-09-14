<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Log;
use App\Models\Peminjaman;
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

    public function kembali(Request $request, $no_peminjaman)
    {
        // dd($request->no_peminjaman);
        $user = Auth::user();
        DetailPeminjaman::where('no_peminjaman', $no_peminjaman)
            ->update(
                [
                    'status' => 'Diproses Warehouse',
                ]
            );


        Peminjaman::where('no_peminjaman', $request->no_peminjaman)
            ->update(
                [
                    'status' => 'Diproses Warehouse',
                    'tglKembali' => Carbon::now()
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Pinjaman di Proses Warehouse',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('/peminjaman');
    }

    public function confirm(Request $request, $no_peminjaman)
    {
        // dd($request->no_peminjaman);
        $user = Auth::user();
        DetailPeminjaman::where('no_peminjaman', $no_peminjaman)
            ->update(
                [
                    'status' => 'Dikembalikan',

                ]
            );


        Peminjaman::where('no_peminjaman', $request->no_peminjaman)
            ->update(
                [
                    'status' => 'Dikembalikan',
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
        return redirect('/peminjaman');
    }

    public function detailpeminjaman($no_peminjaman)
    {
        $data_detail = DetailPeminjaman::where('no_peminjaman', $no_peminjaman)->get();
        $peminjaman = Peminjaman::where('no_peminjaman', $no_peminjaman)->get();
        // dd($data_detail);
        // $user = Auth::user();
        return view('peminjaman/detail', compact('peminjaman', 'data_detail'));
    }
}
