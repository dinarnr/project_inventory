<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\DetailTrkMasuk;
use App\Models\Log;
use App\Models\Master;
use App\Models\SupplierModel;
use App\Models\PO;
use App\Models\Instansi;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TrkMasukController extends Controller
{
    //
    public function transaksi()
    {
        $transaksi_masuk = TransaksiModel::all()->where('instansi', '', '');
        $transaksi_retur = TransaksiModel::all()->where('nama_supplier', '', '');
        return view('warehouse/transaksi/transaksimasuk', compact('transaksi_masuk', 'transaksi_retur'));
    }

    // <------------------Masuk Baru------------------->
    public function addmasukbaru()
    {
        $supplier = SupplierModel::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $transaksi_masuk = TransaksiModel::all();

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiModel::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $noPO = $thnBln . "" . $angka;
        $no_trans =  $kode .  "-"  . $now->year . $now->month . $angka;

        return view('warehouse/transaksi/addmasukbaru', compact('no_trans', 'supplier', 'barang', 'transaksi_masuk'));
    }

    public function addmasukbaru2(Request $request)
    {
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
        return redirect('warehouse/transaksi/masuk');
    }

    public function detailmasuk($no_transaksi)
    {
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('warehouse/transaksi/detailmasukbaru', compact('transaksi_masuk', 'data_detail'));
    }

    // <------------------Masuk Retur------------------->
    public function addmasukretur()
    {
        $transaksi_masuk = TransaksiModel::all()->where('instansi', '', '');
        $transaksi_retur = TransaksiModel::where('instansi', '!=', '')->get();
        $supplier = SupplierModel::all();
        $barang = Master::all();
        $noPO = PO::all();
        $data_instansi = Instansi::all();

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiModel::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        // $no_PO = $thnBln . "" . $angka;
        $no_retur =  $kode .  "-"  . $now->year . $now->month . $angka;

        
        return view('warehouse/transaksi/addmasukretur', compact('data_instansi', 'no_retur', 'noPO', 'supplier', 'barang', 'transaksi_masuk'));
    }

    public function addmasukretur2(Request $request)
    {
        $user = Auth::user();
        $jumlah_data = count($request->no_retur);
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

        return redirect('transaksi');
    }

    public function detailmasukretur($no_transaksi)
    {
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_retur = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('transaksi/detailmasukretur', compact('transaksi_retur', 'data_detail'));
    }
}
