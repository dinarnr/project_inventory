<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelian;
use App\Models\DetailPengajuan;
use Illuminate\Http\Request; 
use App\Models\Log;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Profil;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\Auth;

class PembelianPurchasingController extends Controller
{
    public function pembelian()
    {
        $lunas = Pembelian::all()->where('status','1');
        $hutang = DetailPembelian::all()->where('jenisTransaksi','','angsuran');
        // dd($hutang);
        return view('purchasing/pembelian/invoice', compact('lunas','hutang'));
    }

    public function addinvoice($no_pengajuan)
    {
        $data_pembelian = Pengajuan::where('no_pengajuan',$no_pengajuan)->first();
        $data_detail = DetailPengajuan::where([
            ['no_pengajuan', $no_pengajuan],
            ['status', '2'],
            ])->get();
        $coba= DetailPengajuan::where('no_pengajuan',$no_pengajuan)->get();
        $supplier =  SupplierModel::all();
        // dd($data_detail);
        return view('purchasing/pembelian/addinvoice', compact('coba','data_pembelian', 'data_detail', 'supplier'));
    }

    public function addpembelian2(Request $request)
    {
        $user = Auth::user();
        if ($request->radioButton == 'belumSelesai'){
            Pembelian::create([
                'no_pengajuan' => $request->no_pengajuan,
                'nama_pemohon' => $request->nama_pemohon,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'pic_teknisi' => $request->pic_teknisi,
                'pic_marketing' => $request->pic_marketing,
                'pic_warehouse' => $request->pic_warehouse,
                'pic_admin' => $request->pic_admin,
                'pic_purchasing' => $user->name,

            ]);
            Pengajuan::where('no_pengajuan', $request->no_pengajuan)
                    ->update([
                        'status' => '5',
                        'alasan' => $request->alasan,
                    ]);
            $jumlah_data = count($request->no_peng);
            for ($i = 0; $i < $jumlah_data; $i++) {
                DetailPembelian::create([
                    'no_pengajuan' => $request->no_peng[$i],
                    'namaBarang'=> $request->nama_barang[$i],
                    'harga' => preg_replace('/[^0-9]/','',$request->harga[$i]),
                    'jmlBarang' => $request->jumlah[$i],
                    'totalBeli' => preg_replace('/[^0-9]/','',$request->totalBeli[$i]),
                    'tgl_beli' => $request->tgl_beli[$i],
                    'jenisTransaksi' => $request->jenisTransaksi[$i],
                    'info' => $request->info[$i],
                    'harga_beli' => preg_replace('/[^0-9]/','',$request->harga_beli[$i]),
                    'amount' => preg_replace('/[^0-9]/','',$request->amount[$i]),
                    'supplier' => $request->supplier[$i],

                ]);
            }
            Log::create(
                [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Invoice Belum Selesai',
                'status' => '2',
                'ip'=> $request->ip()

                ]
            );
        } elseif ($request->radioButton == 'selesai1'){
            Pembelian::where('no_pengajuan', $request->no_pengajuan)
                    ->update([
                        'status' => '1'
                    ]);
            Pengajuan::where('no_pengajuan', $request->no_pengajuan)
                    ->update([
                        'status' => '6'
                    ]);
            $jumlah_data = count($request->no_peng);
            for ($i = 0; $i < $jumlah_data; $i++) {
                DetailPembelian::create([
                    'no_pengajuan' => $request->no_peng[$i],
                    'namaBarang'=> $request->nama_barang[$i],
                    'harga' => preg_replace('/[^0-9]/','',$request->harga[$i]),
                    'jmlBarang' => $request->jumlah[$i],
                    'tgl_beli' => $request->tgl_beli[$i],
                    'totalBeli' => preg_replace('/[^0-9]/','',$request->totalBeli[$i]),
                    'jenisTransaksi' => $request->jenisTransaksi[$i],
                    'info' => $request->info[$i],
                    'harga_beli' => preg_replace('/[^0-9]/','',$request->harga_beli[$i]),
                    'amount' => preg_replace('/[^0-9]/','',$request->amount[$i]),
                    'supplier' => $request->supplier[$i],

                ]);
            }
            Log::create(
                [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Invoice',
                'status' => '2',
                'ip'=> $request->ip()

                ]
            );
        }
        else {
            Pembelian::create([
                'no_pengajuan' => $request->no_pengajuan,
                'nama_pemohon' => $request->nama_pemohon,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'pic_teknisi' => $request->pic_teknisi,
                'pic_marketing' => $request->pic_marketing,
                'pic_warehouse' => $request->pic_warehouse,
                'pic_admin' => $request->pic_admin,
                'pic_purchasing' => $user->name,
                'status' => '1',

            ]);
            Pengajuan::where('no_pengajuan', $request->no_pengajuan)
                    ->update([
                        'status' => '6'
                    ]);
            $jumlah_data = count($request->no_peng);
            for ($i = 0; $i < $jumlah_data; $i++) {
                DetailPembelian::create([
                    'no_pengajuan' => $request->no_peng[$i],
                    'namaBarang'=> $request->nama_barang[$i],
                    'harga' => preg_replace('/[^0-9]/','',$request->harga[$i]),
                    'jmlBarang' => $request->jumlah[$i],
                    'tgl_beli' => $request->tgl_beli[$i],
                    'totalBeli' => preg_replace('/[^0-9]/','',$request->totalBeli[$i]),
                    'jenisTransaksi' => $request->jenisTransaksi[$i],
                    'info' => $request->info[$i],
                    'harga_beli' => preg_replace('/[^0-9]/','',$request->harga_beli[$i]),
                    'amount' => preg_replace('/[^0-9]/','',$request->amount[$i]),
                    'supplier' => $request->supplier[$i],

                ]);
            }
            Log::create(
                [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Invoice',
                'status' => '2',
                'ip'=> $request->ip()

                ]
            );

        }
        // return view('pembelian/purchase');
        return redirect('purchasing/pembelian/invoice');
    }

    public function purchase()
    {
        $purchase = PO::all()->where('status','=','4');
        return view('purchasing/pembelian/purchase', compact('purchase'));
    }
  
    public function lunas(Request $request)
    {
        Pembelian::where('id_pembelian',$request->id_pembelian)
                        ->update([
                            'status'=> $request->status
                        ]);
        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Edit Pelunasan',
            'status' => '2',
            'ip'=> $request->ip() 

            ]
        );
        return back()->with('success', "data telah dilunasi");
    }

    public function detaillunas($no_pengajuan)
    {
        $lunas = DetailPembelian::where([

            ['no_pengajuan', $no_pengajuan],
    
            ['jenisTransaksi', '!=', 'angsuran']
    
        ])->get();
        $pembelian = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        // dd($pembelian);
        return view('purchasing/pembelian/detaillunas', compact('pembelian', 'lunas', 'profil', 'data_detail'));
    }

    public function hutang($id_pembelian)
    {
        $data_detail = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        $pembelian = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        $profil = Profil::all();
        $no_pengajuan = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        // dd($no_pengajuan);
        $purchase = PO::all()->where('status','=','4');
        return view('purchasing/pembelian/hutang', compact('no_pengajuan','purchase', 'data_detail', 'pembelian', 'profil'));

    }

    public function bayar(Request $request, $id_pembelian)
    {
        // dd($request->all());
        if ($request->jenisTransaksi == 'angsuran') {
            DetailPembelian::where('id_pembelian',$id_pembelian)
                ->update([
                    'harga_beli' => preg_replace('/[^0-9]/','',$request->totalBayar1),
                    'amount' => preg_replace('/[^0-9]/','',$request->totalBayar),

                ]);
        } else{
            DetailPembelian::where('id_pembelian',$id_pembelian)
                ->update([
                    'jenisTransaksi' => $request->jenisTransaksi,
                    'info' => $request->info 
                ]);
        }
        return redirect('purchasing/pembelian/invoice');
    }

    public function belumselesai($no_pengajuan)
    {
        $data_pembelian = Pengajuan::where('no_pengajuan',$no_pengajuan)->first();
        $alasan= Pembelian::all()->where('no_pengajuan',$no_pengajuan)->first();
        $data_detail = DetailPembelian::where('no_pengajuan',$no_pengajuan)->get();
        $coba= DetailPengajuan::where('no_pengajuan',$no_pengajuan)->get();
        $supplier =  SupplierModel::all();
        // dd($data_detail);
        return view('purchasing/pembelian/detailbelumselesai', compact('alasan','coba','data_pembelian', 'data_detail', 'supplier'));
    }
}
