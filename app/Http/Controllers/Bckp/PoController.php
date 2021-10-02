<?php

namespace App\Http\Controllers;

use App\Models\DetailPO;
use App\Models\Log;
use App\Models\Pembelian;
use App\Models\PO;
use  App\Models\Instansi;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PoController extends Controller
{
    //
    public function index()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        // dd($data_po_wh);
        return view('po\po', compact('data_po', 'data_po_wh'));
    }

    //
    public function addpo()
    {
        // $now = Carbon::now();
        // $thnBln = $now->year . $now->month;

        $kode = strtoupper(substr("NS", 0, 2));
        $check = count(PO::where('no_PO', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%04d", (int)$check + 1);
        $noPO = $kode . "" . $angka;
        $data_instansi = Instansi::all();

        // $noPO = IdGenerator::generate(['table' => 'purchase_order', 'length' => 8, 'prefix' => date('ym')]);
        return view('po/addpo', compact('noPO',  'data_instansi'));
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

        return redirect('/po');
    }

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
        return redirect('/po');
    }

    public function editpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        return view('po/edit', compact('data_po', 'data_detail', 'tanggal'));
    }

    public function confirmpo(Request $request)
    {
        dd($request->input('aktif'));
        $user = Auth::user();
        // DetailPO::where('id_po', $request->is_active)
        //     ->update(
        //         [
        //         'status' => '2'
        //         ]
        //     );

        DetailPO::whereIn('id_po', $request->is_active)
        ->update(array(
                'status'=> '2'
        ));  

        PO::where('no_PO', $request->no_PO)
            ->update(
                [
                    'status' => '2'
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Confirm PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('/po');
    }

    public function reject(Request $request)
    {
        $user = Auth::user();
        if ($user->divisi == "warehouse") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '1',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        } elseif ($user->divisi == "admin") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '3',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        }
        return back()->with('success', "Data telah ditolak");
    }

    public function detailpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        // dd($data_detail);
        $tanggal = Carbon::now();
        $user = Auth::user();
        return view('po/detail', compact('data_po', 'data_detail', 'user', 'tanggal'));
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

    public function add($no_PO)
    {
        $no_PO = $no_PO;
        return view('po/add', compact('no_PO'));
    }

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

        return back()->with('success', "Data telah terhapus");
    }

    public function cancelPO($id_po, Request $request)
    {

        // //mengirim data_brg ke view
        return back()->with('success', "Data telah terhapus");
    }

    public function draft($no_PO, Request $request)
    {
        $user = Auth::user();

        PO::where('no_PO', $no_PO)
            ->update(
                [

                    'status' => '1'
                    //status ganti 1
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
        return redirect('/po');
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
        return redirect('/po');
    }

    public function editisidraft(Request $request, $id_po )
    {
        // dd($request->edit_nama);
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
            'ip'=> $request->ip()

            ]
        );

        return redirect()->back();
    }

    public function addket(Request $request, $id_po )
    {
        // dd($request->edit_nama);
        DetailPO::where('id_po', $id_po)
            ->update([
                
                'keterangan' => $request->edit_keterangan
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Draft',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );

        return redirect()->back();
    }
}
