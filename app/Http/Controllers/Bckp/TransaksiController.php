<?php

namespace App\Http\Controllers;

use App\Models\DetailTrkKeluar;
use App\Models\DetailTrkMasuk;
use App\Models\Log;
use App\Models\Master;
use App\Models\SupplierModel;
use App\Models\TransaksiKeluar;
use App\Models\PO;
use App\Models\DetailPO;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use PurchaseOrderTable;

class TransaksiController extends Controller
{

    public function transaksi()
    {
        $transaksi_masuk = TransaksiModel::all()->where('instansi', '', '');
        $transaksi_retur = TransaksiModel::all()->where('nama_supplier', '', '');
        // dd($transaksi_retur);
        return view('transaksi/transaksi', compact('transaksi_masuk', 'transaksi_retur'));
    }

    // Masuk Baru 
    public function addmasukbaru()
    {
        $supplier = SupplierModel::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $transaksi_masuk = TransaksiModel::all();
        // $no_trans = IdGenerator::generate(['table' => 'transaksi_masuk', 'length' => 9, 'prefix' => date('ymd')]);
        
        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        // $kode = strtoupper(substr($tanggal, 0, 3));
        $check = count(TransaksiModel::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $noPO = $thnBln . "" . $angka;
        $no_trans =  $kode.  "-"  .$now->year . $now->month . $angka;
        // dd($tanggal);

        return view('transaksi/addmasukbaru', compact('no_trans', 'supplier', 'barang', 'transaksi_masuk'));
    }

    public function addmasukbaru2(Request $request)
    {

        // dd( $request->kode_barang);
        $user = Auth::user();
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkMasuk::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiModel::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'nama_supplier' => $request->nama_supplier,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
                'pic_warehouse' => $user->name,
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

        return redirect('/transaksi');
    }

    public function hapus($id,  Request $request){
        $transaksi_masuk = TransaksiModel::where('id', $id)->first();
        // // dd($barang);
        $transaksi_masuk->delete();

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Data Barang',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        // //mengirim data_brg ke view
        return back()->with('success', "Data telah terhapus");
    }

    public function detailmasuk($no_transaksi)
    {
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('transaksi/detailmasuk', compact('transaksi_masuk', 'data_detail'));
        // dd($data_detail);
    }

    //<!------------masuk returr-----------------------------!>
    public function addmasukretur()
    {
        $transaksi_masuk = TransaksiModel::all()->where('instansi', '', '');
        $transaksi_retur = TransaksiModel::where('instansi', '!=', '')->get();
        $supplier = SupplierModel::all();
        $barang = Master::all();
        $noPO = PO::all();
        $data_instansi = Instansi::all();
        $no_retur = IdGenerator::generate(['table' => 'transaksi_masuk', 'length' => 9, 'prefix' => date('ymd')]);
        return view('transaksi/addmasukretur', compact('data_instansi', 'no_retur', 'noPO', 'supplier', 'barang', 'transaksi_masuk'));
    }

    public function addmasukretur2(Request $request)
    {
        $user = Auth::user();
        $jumlah_data = count($request->no_retur);
        // dd($request->no_transaksi);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkMasuk::create(
                [
                    'no_transaksi' => $request->no_retur[$i],
                    'no_PO' => $request->no_PO[$i],
                    'jumlah' => $request->jumlah[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiModel::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'instansi' => $request->instansi,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
                'pic_warehouse' => $user->name,
            ]
        );


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

        return redirect('/transaksi');
    }

    public function detailmasukretur($no_transaksi)
    {
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_retur = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('transaksi/detailmasukretur', compact('transaksi_retur', 'data_detail'));
        // dd($data_detail);
    }

    public function brgkeluar()
    {
        return view('transaksi/brgkeluar');
    }

    // ----------------------Keluar Baru----------------------//

    public function transaksikeluar()
    {
        $transaksi_masuk = TransaksiKeluar::all();
        $transaksi_retur = TransaksiKeluar::all();
        return view('transaksi/transaksikeluar', compact('transaksi_masuk', 'transaksi_retur'));
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
        // $noPO = $thnBln . "" . $angka;
        $no_trans =  $kode.  "-"  .$now->year . $now->month . $angka;
        return view('transaksi/addkeluarbaru', compact('no_trans','data_instansi', 'barang', 'transaksi_keluar','bar'));
    }

    public function fetch(Request $request){
        // dd($request);
       $select = $request->get('select');
       $values = $request->get('value');
       $dependent = $request->get('dependent');
    //    dd($dependent);
       $data = DB::table('detail_PO')->where('no_PO', $values)->groupBy('nama_barang')->get();
       $output = '<option value="">Pilih Barang'.'</option>';
       foreach ($data as $row) {
           $output .= '<option value=""'.$row->nama_barang.'">'.$row->nama_barang.'</option>';
       }
       echo $output;
    }

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

        return redirect('/transaksikeluar');
    }

    // -----------------------KELUAR RETURR----------------------------

    public function addkeluarretur()
    {
        $transaksi_keluar = TransaksiKeluar::all();
        $data_instansi = Instansi::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $supplier = SupplierModel::all();
        $noPO = PO::all();

        //  $no_trans = IdGenerator::generate(['table' => 'transaksi_masuk', 'length' => 12, 'prefix' => 'TRK-'.date('ym')]);
        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiKeluar::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans =  $kode .  "-"  . $now->year . $now->month . $angka;
        return view('transaksi/addkeluarretur', compact('no_trans', 'noPO', 'data_instansi', 'supplier', 'barang', 'transaksi_keluar'));
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

        return redirect('/transaksikeluar');
    }
}
