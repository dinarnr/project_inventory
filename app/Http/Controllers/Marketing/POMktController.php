<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPO;
use App\Models\Log;
use App\Models\PO;
use  App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class POMktController extends Controller
{
    //
    public function index()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        return view('marketing/po/po', compact('data_po', 'data_po_wh'));
    }

    public function addpo()
    {
        $kode = strtoupper(substr("NS", 0, 2));
        $check = count(PO::where('no_PO', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%04d", (int)$check + 1);
        $noPO = $kode . "" . $angka;
        $data_instansi = Instansi::all();
        return view('marketing/po/addpo', compact('noPO',  'data_instansi'));
    }

    public function addpo2(Request $request)
    {
        $user = Auth::user();
        if ($request->proses == 'proses') {
            $jumlah_data = count($request->noPO);
            for ($i = 0; $i < $jumlah_data; $i++) {
                DetailPO::create(
                    [
                        'no_PO' => $request->noPO[$i],
                        'nama_barang' => $request->nama_barang[$i],
                        'jumlah' => $request->jumlah[$i],
                        'rate' => $request->rate[$i],
                        'amount' => $request->amount[$i],
                        'keterangan' => '-',
                        'keterangan_barang' => $request->keterangan[$i],
                    ]
                );
            }

            PO::create(
                [
                    'no_PO' => $request->no_PO,
                    'instansi' => $request->instansi,
                    'tgl_pemasangan' => $request->tgl_transaksi,
                    'pic_marketing' => $user->name,
                    'status' => '1'
                ]
            );

            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Create PO',
                    'status' => '2',
                    'ip' => $request->ip()

                ]
            );
        } else {
            $jumlah_data = count($request->noPO);
            for ($i = 0; $i < $jumlah_data; $i++) {
                DetailPO::create(
                    [
                        'no_PO' => $request->noPO[$i],
                        'nama_barang' => $request->nama_barang[$i],
                        'jumlah' => $request->jumlah[$i],
                        'rate' => $request->rate[$i],
                        'amount' => $request->amount[$i],
                        'keterangan_barang' => $request->keterangan[$i],
                    ]
                );
            }

            PO::create(
                [
                    'no_PO' => $request->no_PO,
                    'instansi' => $request->instansi,
                    'tgl_pemasangan' => $request->tgl_transaksi,
                    'pic_marketing' => $user->name
                ]
            );

            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Create PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        }

        return redirect('marketing/po');
    }

    // ketika memilih proses atau draft
    public function adddraft2(Request $request)
    {
        $user = Auth::user();
        $jumlah_data = count($request->noPO);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPO::create(
                [
                    'no_PO' => $request->noPO[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'jumlah' => $request->jumlah[$i],
                    'rate' => $request->rate[$i],
                    'amount' => $request->amount[$i],
                    'keterangan_barang' => $request->keterangan[$i],
                ]
            );
        }

        PO::create(
            [
                'no_PO' => $request->no_PO,
                'instansi' => $request->instansi,
                'tgl_pemasangan' => $request->tgl_transaksi,
                'pic_marketing' => $user->name,
                'status' => '7'
            ]
        );

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Draft PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('marketing/po');
    }

    //ketika status draft
    public function editpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        return view('marketing/po/editpo', compact('data_po', 'data_detail', 'tanggal'));
    }

    public function detailpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $user = Auth::user();
        return view('marketing/po/detail', compact('data_po', 'data_detail', 'user', 'tanggal'));
    }

    //di edit draft bisa tambah data
    public function add($no_PO)
    {
        $no_PO = $no_PO;
        return view('marketing/po/adddraft', compact('no_PO'));
    }

    //di edit draft bisa tambah data
    public function add2(Request $request)
    {
        $user = Auth::user();

        $jumlah_data = count($request->noPO);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPO::create(
                [
                    'no_PO' => $request->noPO[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'jumlah' => $request->jumlah[$i],
                    'rate' => $request->rate[$i],
                    'amount' => $request->amount[$i],
                    'keterangan_barang' => $request->keterangan[$i],
                ]
            );
        }

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Detail Draft',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );

        return redirect('marketing/editpo');
    }

    public function draft($no_PO, Request $request)
    {
        $user = Auth::user();

        PO::where('no_PO', $no_PO)
            ->update(
                [
                    'status' => '1'
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Draft to Proses',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('marketing/po');
    }
    public function batal(Request $request, $id_PO)
    {
        // dd($request->non);
        $user = Auth::user();
        PO::where('id_PO', $id_PO)
            ->update([
                'status' => '7',
                'alasan' => $request->alasan,
            ]);
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Cancel PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('marketing/po');
    }

    public function editisidraft(Request $request, $id_po)
    {
        DetailPO::where('id_po', $id_po)
            ->update([
                'nama_barang' => $request->edit_nama,
                'keterangan_barang' => $request->edit_keterangan,
                'jumlah' => $request->edit_jumlah,
                'rate' => $request->edit_rate,
                'amount' => $request->edit_amount
            ]);

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Draft',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect()->back();
    }
}
