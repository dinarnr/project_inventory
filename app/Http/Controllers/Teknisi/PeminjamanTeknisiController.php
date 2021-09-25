<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Log;
use App\Models\Master;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PeminjamanTeknisiController extends Controller
{
    //
    public function peminjaman()
    {
        $peminjaman = Peminjaman::all();
        return view('teknisi/peminjaman/vpinjam', compact('peminjaman'));
    }

    public function addpinjam()
    {
        $barang = Master::all();
        $kode = strtoupper(substr("PJM", 0, 3));
        $check = count(Peminjaman::where('no_peminjaman', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_peminjaman = $kode . "-" . $angka;
        return view('teknisi/peminjaman/addpinjam', compact('no_peminjaman', 'barang'));
    }

    public function addpinjam2(Request $request)
    {
        $user = Auth::user();
        $jumlah_data = count($request->no_peminjaman);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPeminjaman::create(
                [
                    'no_peminjaman'  => $request->no_peminjaman[$i],
                    'nama_barang' => $request->nama_brg[$i],
                    'jumlah' => $request->jumlah[$i],
                ]
            );
        }
        $jumlah_barang = count($request->nama_brg);

        Peminjaman::create([
            'pic_teknisi'          => $user->name,
            'no_peminjaman'  => $request->no_peminjaman2,
            'jumlah'        => $jumlah_barang,
            'kebutuhan'    => $request->kebutuhan,
            'tglPinjam'     => $request->tgl_pinjam,
            // 'tglKembali'    => $request->null,
            'status'        => 'pinjam'
        ]);

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Peminjaman',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('teknisi/peminjaman');
    }


    public function kembali(Request $request, $no_peminjaman)
    {
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
        return redirect()->back();
    }

    public function detailkembali(Request $request, $id_peminjaman)
    {
        $user = Auth::user();
        DetailPeminjaman::where('id_peminjaman', $id_peminjaman)
            ->update(
                [
                    'status' => '1',
                ]
            );

        Peminjaman::where('id_peminjaman', $request->id_peminjaman)
            ->update(
                [
                    'status' => '1',
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
        return redirect()->back();
    }

    public function detailpeminjaman($no_peminjaman)
    {
        $data_detail = DetailPeminjaman::where('no_peminjaman', $no_peminjaman)->get();
        $peminjaman = Peminjaman::where('no_peminjaman', $no_peminjaman)->get();
        return view('teknisi/peminjaman/detail', compact('peminjaman', 'data_detail'));
    }
}
