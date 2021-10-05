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
use App\Models\Profil;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

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

    public function fetch(Request $request){ 
        // dd($request);
        $select = $request->get('select');
        $values = $request->get('value');
        $dependent = $request->get('dependent');

        //    dd($dependent);
        $data = DB::table('master_data')->where('nama_barang', $values)->groupBy('kode_barang')->get();
        
        foreach ($data as $row) {
            $output = '<option value="'.$row->kode_barang.'">'.$row->kode_barang.'</option>';
        }
        echo $output;
    }

    // public function kode_barang($nama_brg)
    // {
    //     $data = Master::where('nama_barang',$nama_brg)->first();
    //     return response()->json($data);
    // }

    public function addmasukbaru2(Request $request)
    {
        $user = Auth::user();
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkMasuk::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah1[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'nama_barang' => $request->nama_barang1[$i],
                    'keterangan' => $request->keterangan1[$i],
                ]
            );
        }
        TransaksiModel::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'nama_supplier' => $request->nama_supplier,
                'tgl_transaksi' => $request->tgl_transaksi,
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

        // dd($request->all());
        Stok::create(
            [
                'nama_barang' => $request->nama_barang,
                'stok' => $request->jumlah,
                'kode_barang' => $request->kode_barang,
                'keterangan' => 'Warehouse Transaksi Masuk Baru'
            ]  
        );
        return redirect('warehouse/transaksi/masuk');
    }

    public function detailmasuk($no_transaksi)
    {
        $profil = Profil::all();
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_masuk = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('warehouse/transaksi/detailmasukbaru', compact('transaksi_masuk', 'data_detail', 'profil'));
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
                    'jumlah' => $request->jumlah1[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'nama_barang' => $request->nama_barang1[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiModel::create(
            [
                'no_transaksi' => $request->no_transaksi,
                'instansi' => $request->instansi,
                'pengirim' => $request->pengirim,
                'tgl_transaksi' => $request->tgl_transaksi,
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

        // dd($request->all());
        Stok::create(
            [
                'nama_barang' => $request->nama_barang,
                'stok' => $request->jumlah,
                'kode_barang' => $request->kode_barang,
                'keterangan' => 'Warehouse Transaksi Masuk Retur'
            ]  
        );
        return redirect('/warehouse/transaksi/masuk');
    }
    public function editjumlah(Request $request, $id_transaksi )//modal edit jumalah -> baru retur sama saja
    {
        // dd($request->edit_nama);
        DetailTrkMasuk::where('id_transaksi', $id_transaksi)
            ->update([
                
                'jumlah' => $request->edit_jumlah
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Detail',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect()->back();
    }

    public function detailmasukretur($no_transaksi)
    {
        $profil = Profil::all();
        $data_detail = DetailTrkMasuk::where('no_transaksi', $no_transaksi)->get();
        $transaksi_retur = TransaksiModel::where('no_transaksi', $no_transaksi)->get();
        return view('/warehouse/transaksi/detailmasukretur', compact('transaksi_retur', 'data_detail', 'profil'));
    }
}
