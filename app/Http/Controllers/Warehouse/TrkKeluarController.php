<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller;
use App\Models\DetailPO;
use App\Models\DetailTrkKeluar;
use App\Models\Log;
use App\Models\Master;
use App\Models\SupplierModel;
use App\Models\TransaksiKeluar;
use App\Models\PO;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\Profil;
use App\Models\Stok;
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

        $transaksi_garansi = TransaksiKeluar::all()->where('jns_barang', '', 'garansi');
        $transaksi_instalasi = TransaksiKeluar::all()->where('jns_barang', '', 'instalasi');
        $transaksi_retur = TransaksiKeluar::all()->where('jns_barang', '', '');
        return view('warehouse/transaksi/transaksikeluar', compact('transaksi_garansi', 'transaksi_instalasi', 'transaksi_retur'));
    }

    public function addkeluarbaru()
    {
        $transaksi_keluar = TransaksiKeluar::all();
        $data_instansi = Instansi::all();
        $barang = Master::where([['status', 'aktif']])->get();
        $bar = DB::table('detail_PO')->groupBy('no_PO')->get();

        $noPO=PO::all();
        $brg=DetailPO::all();
         // $no_trans = IdGenerator::generate(['table' => 'transaksi_masuk', 'length' => 8, 'prefix' => 'TRK-',date('ym')]);
        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiKeluar::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans =  $kode.  "-"  .$now->year . $now->month . $angka;
        return view('warehouse/transaksi/addkeluarbaru', compact('no_trans', 'noPO','brg','data_instansi', 'barang', 'transaksi_keluar','bar'));
    }
    
    public function keluargaransi(Request $request)
    {   
        // dd($request);
        $user = Auth::user();
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkKeluar::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah1[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'nama_barang' => $request->nama_barang1[$i],            
                    'jns_barang' => $request->jns_barang[$i],
                ]
            );
        }
        TransaksiKeluar::create(
            [       
                'pic_warehouse' => $user->name,
                'no_PO'         => $request->no_PO,
                'no_transaksi'  => $request->no_transaksi,
                'tgl_transaksi' => $request->tgl_transaksi,
                'jns_barang'    => $request->jenis_barang,
            ]
        );
        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Kelaur Garansi',
                'status' => '2',
                'ip' => $request->ip()
            ]
        );
        // dd($request->all());
        $new_stok = Master::whereIn('kode_barang',$request->kode_barang1)->pluck('stok');
        $jumlah_stok = count($new_stok);
        for ($i = 0; $i < $jumlah_stok; $i++) {
            Stok::create(
                [
                    'nama_barang' => $request->nama_barang1[$i],
                    'stok' => $request->jumlah1[$i],
                    'stok_akhir' => $new_stok[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'keterangan' => 'Warehouse Transaksi Keluar Garansi'
                ]  
            );
        }

        return redirect('warehouse/transaksikeluar');
    }

    public function detailgaransi($no_transaksi)
    {
        $profil = Profil::all();
        $detail_keluar = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_garansi = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('warehouse/transaksi/detailkeluargaransi', compact('detail_keluar', 'transaksi_garansi', 'profil'));
    }

    //---------------------Transaksi Instalasi----------------------------//
    public function transaksiinstalasi(Request $request)
    {
        $data_so = PO::all();
        $SO = PO::all();
        $instansi = Instansi::all();
        $brg = DB::table('detail_PO')->groupBy('no_SO', 'status')->get();

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiKeluar::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans=  $kode.  "-"  .$now->year . $now->month . $angka;
        // dd($data_detail);
        return view('warehouse/transaksi/transaksi_instalasi', compact('data_so', 'SO', 'brg', 'instansi', 'no_trans')); 

    }

    public function fetch(Request $request){ 
        // dd($request);
        $select = $request->get('select');
        $values = $request->get('value');
        $dependent = $request->get('dependent');

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $kode = strtoupper(substr("TRK", 0, 3));
        $check = count(TransaksiKeluar::where('no_transaksi', 'like', "%$thnBln%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_trans =  $kode.  "-"  .$now->year . $now->month . $angka;

        //    dd($dependent);
        $data = DB::table('detail_PO')->where([['no_SO', $values],['status', '2']])->groupBy('nama_barang')->get();
        $output = '<tr id="row"></tr>';
        foreach ($data as $row) {
            $output .= '<tr id="row"></td>
            <td style="display:none;"><input type="text" style="outline:none;border:0;" name="no_trans[]" id="no_trans" value="'.$no_trans.'"></td>
            <td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="'.$row->nama_barang.'"></td> 
            <td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="nama_barang1" id="nama_barang1" value="'.$row->nama_barang.'"></td> 
            <td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="kode_barang[]" id="kode_barang" value="'.$row->kode_barang.'"></td> 
            <td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="kode_barang1" id="kode_barang1" value="'.$row->kode_barang.'"></td> 
            <td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="no_SO[]" id="no_SO" value="'.$row->no_SO.'"></td> 
            <td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="'.$row->jumlah.'"></td>
            <td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="jumlah1" id="jumlah1" value="'.$row->jumlah.'"></td></tr>';;
        }
        echo $output;
    }

    public function instansi($no_so)
    {
        $data = DetailPO::where('no_SO',$no_so)->first();
        return response()->json($data);
    }

    public function kode(Request $request){ 
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

    public function keluarinstalasi(Request $request)
    {
        // dd($request->no_trans); 
        $rules = [
            'pengirim' => 'required',
            'penerima' => 'required',
        ];

        $messages = [
            'pengirim.required' => '*Nama pengirim tidak boleh kosong',
            'penerima.required' => '*Nama penerima tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);
        $user = Auth::user();
        $jumlah_data = count($request->jumlah);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkKeluar::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->no_trans[$i],
                ]   
            );
        }
        TransaksiKeluar::create(
            [
                    'pic_warehouse' => $user->name,
                    'no_transaksi' => $request->no_transaksi,
                    'tgl_instalasi' => $request->tgl_instalasi,
                    'no_SO' => $request->no_SO,
                    'instansi' => $request->instansi,
                    'pengirim' => $request->pengirim,
                    'penerima' => $request->penerima,
                    'jns_barang' => $request->jenis_barang,
            ]
        );
        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Kelaur Instalasi',
                'status' => '2',
                'ip' => $request->ip()
            ]
        );
        // dd($request->all());
        $new_stok = Master::whereIn('kode_barang',$request->kode_barang)->pluck('stok');
        $jumlah_stok = count($new_stok);
        for ($i = 0; $i < $jumlah_stok; $i++) {
            Stok::create(
                [
                    'nama_barang' => $request->nama_barang[$i],
                    'stok' => $request->jumlah[$i],
                    'stok_akhir' => $new_stok[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'keterangan' => 'Warehouse Transaksi Keluar Instalasi'
                ]  
            );
        }
        return redirect('warehouse/transaksikeluar');
    }

    public function detailinstalasi($no_transaksi)
    {
        $profil = Profil::all();
        $detail_keluar = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_instalasi = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('warehouse/transaksi/detailkeluarinstalasi', compact('detail_keluar', 'transaksi_instalasi', 'profil'));
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
        $user = Auth::user();
        $jumlah_data = count($request->no_trans);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailTrkKeluar::create(
                [
                    'no_transaksi' => $request->no_trans[$i],
                    'jumlah' => $request->jumlah1[$i],
                    'no_PO' => $request->no_PO[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'nama_barang' => $request->nama_barang1[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        TransaksiKeluar::create(
            [
                'pic_warehouse' => $user->name,
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

        $new_stok = Master::whereIn('kode_barang',$request->kode_barang1)->pluck('stok');
        $jumlah_stok = count($new_stok);
        for ($i = 0; $i < $jumlah_stok; $i++) {
            Stok::create(
                [
                    'nama_barang' => $request->nama_barang1[$i],
                    'stok' => $request->jumlah1[$i],
                    'stok_akhir' => $new_stok[$i],
                    'kode_barang' => $request->kode_barang1[$i],
                    'keterangan' => 'Warehouse Transaksi Keluar Retur'
                ]  
            );
        }

        return redirect('warehouse/transaksikeluar');
    }

    public function detailretur($no_transaksi)
    {
        $profil = Profil::all();
        $detail_keluar = DetailTrkKeluar::where('no_transaksi', $no_transaksi)->get();
        $transaksi_retur = TransaksiKeluar::where('no_transaksi', $no_transaksi)->get();
        return view('warehouse/transaksi/detailkeluarretur', compact('detail_keluar', 'transaksi_retur', 'profil'));
    }
}

