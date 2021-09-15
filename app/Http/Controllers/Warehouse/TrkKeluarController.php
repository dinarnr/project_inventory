<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller; 
use App\Models\DetailTrkKeluar;
use App\Models\Log;
use App\Models\Master;
use App\Models\SupplierModel;
use App\Models\TransaksiKeluar;
use App\Models\PO;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TrkKeluarController extends Controller
{
    public function brgkeluar()
    {
        return view('transaksi/brgkeluar');
    }

    // ----------------------Keluar Baru----------------------//

    public function transaksikeluar()
    {
        $transaksi_masuk = TransaksiKeluar::all();
        $transaksi_retur = TransaksiKeluar::all();
        return view('warehouse/transaksi/transaksikeluar', compact('transaksi_masuk', 'transaksi_retur'));
    }

    public function addkeluarbaru()
    {
        $transaksi_keluar = TransaksiKeluar::all();
        $data_instansi = Instansi::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $bar = DB::table('detail_PO')->groupBy('no_PO')->get();
         // $no_trans = IdGenerator::generate(['table' => 'transaksi_masuk', 'length' => 8, 'prefix' => 'TRK-',date('ym')]);
        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiModel::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans =  $kode.  "-"  .$now->year . $now->month . $angka;
        return view('warehouse/transaksi/addkeluarbaru', compact('no_trans','data_instansi', 'barang', 'transaksi_keluar','bar'));
    }

    // public function fetch(Request $request){
    //    $select = $request->get('select');
    //    $values = $request->get('value');
    //    $dependent = $request->get('dependent');
    //    $data = DB::table('detail_PO')->where('no_PO', $values)->groupBy('nama_barang')->get();
    //    $output = '<option value="">Pilih Barang'.'</option>';
    //    foreach ($data as $row) {
    //        $output .= '<option value=""'.$row->nama_barang.'">'.$row->nama_barang.'</option>';
    //    }
    //    echo $output;
    // }

    public function addkeluarbaru2(Request $request)
    {
        // dd($request->no_trans);
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkKeluar::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah[$i],
                    'no_PO' => $request->no_PO[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiKeluar::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'instansi' => $request->instansi,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
            ]
        );

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Masuk Baru',
                'status' => '2',
                'ip' => $request->ip()
            ]
        );

        return redirect('warehouse/transaksikeluar');
    }

    // -----------------------KELUAR RETURR----------------------------

    public function addkeluarretur()
    {
        $transaksi_keluar = TransaksiKeluar::all();
        $data_instansi = Instansi::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $supplier = SupplierModel::all();
        $noPO = PO::all();

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiKeluar::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans =  $kode .  "-"  . $now->year . $now->month . $angka;
        return view('warehouse/transaksi/addkeluarretur', compact('no_trans', 'noPO', 'data_instansi', 'supplier', 'barang', 'transaksi_keluar'));
    }

    public function addkeluarretur2(Request $request)
    {
        // dd($request->no_trans);
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkKeluar::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah[$i],
                    'no_PO' => $request->no_PO[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiKeluar::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'tgl_transaksi' => $request->tgl_transaksi,
                'nama_supplier' => $request->nama_supplier,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
            ]
        );

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Masuk Baru',
                'status' => '2',
                'ip' => $request->ip()
            ]
        );

        return redirect('warehouse/transaksikeluar');
    }
}
