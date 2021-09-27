<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPO;
use App\Models\Log;
use App\Models\PO;
use App\Models\Profil;
use  App\Models\Instansi;
use App\Models\Master;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class POMktController extends Controller
{
    //
    public function index()
    {
        $data_po_wh = PO::all()->where('status','>=', '1');
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
        $barang = Master::where([['status', 'aktif']])->get();

        
        $kode = strtoupper(substr("SO-", 0, 3));
        $check = count(PO::where('no_SO', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $noSO = $kode . "" . $angka;

        // $noPO = IdGenerator::generate(['table' => 'purchase_order', 'length' => 8, 'prefix' => date('ym')]);
      
        return view('marketing/po/addpo', compact('noPO', 'noSO', 'data_instansi', 'barang'));
    }

    // ketika memilih proses atau draft
    public function addpo2(Request $request)
    {
        // dd($request->no_SO);
       $user = Auth::user();
        if ($request->proses == 'proses') {
        $jumlah_data = count($request->noPO);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPO::create(
                [
                    'no_PO' => $request->noPO[$i],
                    'no_SO' => $request->noSO[$i],
                    'instansi' => $request->instansi1[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'jumlah' => $request->jumlah[$i],
                    'rate' => $request->rate1[$i],
                    'amount' => $request->amount1[$i],
                    'keterangan_barang' => $request->keterangan[$i],
                ]
            );
        }

        PO::create(
            [
                'no_PO' => $request->no_PO,
                'no_SO' => $request->no_SO,
                'instansi' => $request->instansi,
                'total' => $request->total1,
                'ppn' => $request->ppn,
                'pph' => $request->pph,
                'balance' => $request->balance1,
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
                        'no_SO' => $request->noSO[$i],
                        'instansi' => $request->instansi1[$i],
                        'nama_barang' => $request->nama_barang[$i],
                        'jumlah' => $request->jumlah[$i],
                        'rate' => $request->rate1[$i],
                        'amount' => $request->amount1[$i],
                        'keterangan_barang' => $request->keterangan[$i],
                    ]
                );
            }

            PO::create(
                [
                    'no_PO' => $request->no_PO,
                    'no_SO' => $request->no_SO,
                    'instansi' => $request->instansi,
                    'total' => $request->total1,
                    'ppn' => $request->ppn,
                    'pph' => $request->pph,
                    'balance' => $request->balance,
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

    
    // public function adddraft2(Request $request)
    // {
    //     $user = Auth::user();
    //     $jumlah_data = count($request->noPO);
    //     for ($i = 0; $i < $jumlah_data; $i++) {
    //         DetailPO::create(
    //             [
    //                 'no_PO' => $request->noPO[$i],
    //                 'nama_barang' => $request->nama_barang[$i],
    //                 'jumlah' => $request->jumlah[$i],
    //                 'rate' => $request->rate1[$i],
    //                 'amount' => $request->amount1[$i],
    //                 'keterangan_barang' => $request->keterangan[$i],
    //             ]
    //         );
    //     }

    //     PO::create(
    //         [
    //             'no_PO' => $request->no_PO,
    //             'instansi' => $request->instansi,
    //             'total' => $request->total1,
    //             'ppn' => $request->ppn,
    //             'pph' => $request->pph,
    //             'balance' => $request->balance,
    //             'tgl_pemasangan' => $request->tgl_transaksi,
    //             'pic_marketing' => $user->name,
    //             'status' => '7'
    //         ]
    //     );

    //     $user = Auth::user();
    //     Log::create(
    //         [
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'divisi' => $user->divisi,
    //             'deskripsi' => 'Create Draft PO',
    //             'status' => '2',
    //             'ip' => $request->ip()

    //         ]
    //     );
    //     return redirect('marketing/po');
    // }

    //ketika status draft
    public function editpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $profil = Profil::all();
        $data_po = PO::all()->where('no_PO', $no_PO);
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('instansi');
        $instansi = Instansi::where('nama_instansi', $nama_instansi)->get();
        return view('marketing/po/editpo', compact('data_po', 'data_detail', 'tanggal','total', 'instansi','profil'));
    }

    public function detailpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $profil = Profil::all();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('instansi');
        $user = Auth::user();
        $instansi = Instansi::where('nama_instansi', $nama_instansi)->get();
        return view('marketing/po/detail', compact('data_po', 'data_detail', 'user', 'tanggal', 'total', 'instansi','profil'));
    }

    //di edit draft bisa tambah data
    public function add($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::all()->where('no_PO', $no_PO);
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('instansi');
        $no_SO = PO::where('no_PO', $no_PO)->pluck('no_SO');
        $instansi = Instansi::where('nama_instansi', $nama_instansi)->get();
        return view('marketing/po/adddraft', compact('no_PO', 'data_detail', 'data_po', 'tanggal', 'total', 'nama_instansi', 'instansi','no_SO'));
    }

    //di edit draft bisa tambah data
    public function add2(Request $request)
    {
        $user = Auth::user();
        // dd($request->nama_instansi);
        $jumlah_data = count($request->noPO);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPO::create(
                [
                    'no_PO' => $request->noPO[$i],
                    'no_SO' => $request->noSO[$i],
                    'instansi' => $request->nama_instansi[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'jumlah' => $request->jumlah[$i],
                    'rate' => $request->rate1[$i],
                    'amount' => $request->amount1[$i],
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
        return redirect()->back();
    }
//         return redirect('marketing/editpo');
//     }

    #simpan/proses draft
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

    public function deletepo($id_po, Request $request)
    {
        $data_detail = DetailPO::where('id_po', $id_po)->first();
        $data_detail->delete();

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Data Detail PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        // //mengirim data_brg ke view
        return back()->with('success', "Data telah terhapus");
    }
    public function tglpemasangan($id_PO, Request $request)
    {
        $user = Auth::user();

        PO::where('id_PO', $id_PO)
            ->update(
                [
                    'tgl_pemasangan' => $request->tglpemasangan,
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Tanggal Pemasangan',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('marketing/po');
    }
}
