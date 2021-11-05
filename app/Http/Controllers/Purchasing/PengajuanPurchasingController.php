<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Models\DetailPengajuan;
use App\Models\Log;
use App\Models\Master;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Instansi;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanPurchasingController extends Controller
{
    //-----------------------------------------pengajuan pembelian---------------------------------------------------------------//
    public function pengpembelian()
    {
        $pembelian= Pengajuan::all()->whereBetween('status',[4,5]);
        $alasan= Pengajuan::all()->where('status','','5')->first();
        return view('purchasing/pengajuan/pembelian', compact('pembelian','alasan'));
    }

    public function addpembelian()
    {
        $kode = strtoupper(substr("PEM", 0, 3));
        $check = count(Pengajuan::where('noPO', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%04d", (int)$check + 1);
        $no_peng = $kode . "" . $angka;

        $pembelian= Pengajuan::all();
        $noPO =PO::all();
        $data_instansi = Instansi::all();
        // dd($no_peng);
    
        return view('purchasing/pengajuan/addpembelian', compact('pembelian','noPO','data_instansi', 'no_peng'));
    }

    public function addpembelian2(Request $request)
    {
       // dd( $request->kode_barang);
       $jumlah_data = count($request->no_peng);
       for ($i = 0; $i < $jumlah_data; $i++) {
           DetailPengajuan::create(
               [
                   'no_pengajuan' => $request->no_peng[$i],
                   'jumlah' => $request->jumlah[$i],
                   'kode_barang' => $request->kode_barang[$i],
                   'nama_barang' => $request->nama_barang[$i],
                   'keterangan' => $request->keterangan[$i],
               ]
           );
       }
           Pengajuan::create(
               [
                   'no_pengajuan' => $request->no_pengajuan,
                   'nama_supplier' => $request->nama_supplier,
                   'pengirim' => $request->pengirim,
                   'penerima' => $request->penerima,
               ]);
           
           $user = Auth::user();
           Log::create(
               [
               'name' => $user->name,
               'email' => $user->email,
               'divisi' => $user->divisi,
               'deskripsi' => 'Create Masuk Baru',
               'status' => '2',
               'ip'=> $request->ip()
           ]);

       return redirect('purchasing/pengajuan/pembelian');
    }

    public function detailpengajuan($no_pengajuan)
    {
        $profil = Profil::all();
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $coba = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        // dd($coba);
        $pengajuan_retur = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        return view('/purchasing/pengajuan/detailpengajuanpembelian', compact('pengajuan_retur', 'data_detail', 'profil', 'coba'));
    }

    public function prosespengajuan(Request $request)
    {
        $user = Auth::user();
        if ($request->proses == 'proses') {
                DetailPengajuan::where('id_detailPengajuan', $request->is_active)
                    ->update(
                        [
                        'status' => '4'
                        ]
                    );
                Pengajuan::where('no_pengajuan', $request->no_peng)
                    ->update(
                        [
                            'status' => '4'
                        ]
                    );
        
                Log::create(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'divisi' => $user->divisi,
                        'deskripsi' => 'Confirm Pengajuan Retur ',
                        'status' => '2',
                        'ip' => $request->ip()
        
                    ]
                );
    } else {
        DetailPengajuan::where('id_detailPengajuan', $request->is_active)
            ->update(
                [
                'status' => '1'
                ]
            );

        Pengajuan::where('no_pengajuan', $request->no_peng)
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
                'deskripsi' => 'Confirm Draft pengajuan retur',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
    }
        return redirect('marketing/pengajuan/pembelian');
    }

}
