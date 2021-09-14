<?php

namespace App\Http\Controllers\Teknisi;

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
        return view('teknisi/teknisi/peminjaman', compact('peminjaman'));
    }

    public function addpinjam()
    {

        // $now = Carbon::now();
        // $thnBln = $now->year . $now->month;
        // $check = count(Peminjaman::where('no_peminjaman', 'like', "%$thnBln%")->get()->toArray());
        // $angka = sprintf("%03d", (int)$check + 1);
        // return view('peminjaman/addpinjam', compact('angka'));

        $kode = strtoupper(substr("PJM", 0, 3));
        $check = count(Peminjaman::where('no_peminjaman', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_peminjaman = $kode . "-" . $angka;
        // dd($no_peminjaman);
        return view('peminjaman/addpinjam', compact('no_peminjaman'));
    }

    public function addpinjam2(Request $request)
    {
        $user = Auth::user();

        $jumlah_data = count($request->no_peminjaman);

        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPeminjaman::create(
                [
                    'no_peminjaman'  => $request->no_peminjaman[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'jumlah' => $request->jumlah[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        $jumlah_barang = count($request->nama_barang);

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
        return redirect('peminjaman');
    }

    public function editpinjam($id_peminjaman)
    {
        $peminjaman = Peminjaman::find($id_peminjaman);
        return view('peminjaman/edit', compact('peminjaman'));
    }

    public function updatePinjam(Request $request)
    {
        if ($request->edit_tgl_kembali) {
            $status = 'dikembalikan';
        } else {
            $status = 'pinjam';
        }
        Peminjaman::where('id_peminjaman', $request->edit_id_pinjam)
            ->update([
                'pic_teknisi'   => $request->edit_nama,
                'no_peminjaman' => $request->edit_no,
                'kebutuhan'     => $request->edit_kebutuhan,
                'tglPinjam'     => $request->edit_tgl_pinjam,
                'tglKembali'    => $request->edit_tgl_kembali,
                'status'        => $status
            ]);
        return redirect('peminjaman');
        // return redirect()->back();
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

    public function detailpeminjaman($no_peminjaman)
    {
        $data_detail = DetailPeminjaman::where('no_peminjaman', $no_peminjaman)->get();
        $peminjaman = Peminjaman::where('no_peminjaman', $no_peminjaman)->get();
        // dd($data_detail);
        // $user = Auth::user();
        return view('peminjaman/detail', compact('peminjaman', 'data_detail'));
    }
}
