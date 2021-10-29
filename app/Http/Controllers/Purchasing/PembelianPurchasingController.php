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
        $lunas = Pembelian::all()->where('status','!=','hutang');
        $hutang = Pembelian::all()->where('status','','hutang');
        return view('purchasing/pembelian/invoice', compact('lunas','hutang'));
    }

    public function addinvoice($no_pengajuan)
    {
        $data_pembelian = Pengajuan::where('no_pengajuan',$no_pengajuan)->first();
        $data_detail = DetailPengajuan::all()->where('no_pengajuan',$no_pengajuan);
        $supplier =  SupplierModel::all();
        // dd($data_detail);
        return view('purchasing/pembelian/addinvoice', compact('data_pembelian', 'data_detail', 'supplier'));
    }

    public function addpembelian2(Request $request)
    {
        $rules = [
            'supplier' => 'required',
            'harga_jual' => 'required',
            'tgl_beli' => 'required',

        ];

        $messages = [
            'supplier.required' => '*Supplier barang tidak boleh kosong',
            'harga_jual.required' => '*Harga barang tidak boleh kosong',
            'tgl_beli.required' => '*Tanggal Beli barang tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);
        // dd(preg_replace('/[^0-9]/','',$request->harga_jual));
        Pembelian::create([
            'no_pengajuan' => $request->no_pengajuan,
            'nama_pemohon' => $request->nama_pemohon,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'tglBeli' => $request->tgl_beli,
            'harga' => preg_replace('/[^0-9]/','',$request->harga_jual),
            'supplier' => $request->supplier,
            'totalBayar' =>preg_replace('/[^0-9]/','',$request->harga_beli),
            'status' => $request->jenisTransaksi,
            'sisaBayar' => preg_replace('/[^0-9]/','',$request->amount)
        ]);
        PO::where('id_PO', $request->id_PO)
                ->update([
                    'status' => '5'
                ]);
        $jumlah_data = count($request->no_peng);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPembelian::create([
                'no_pengajuan' => $request->no_peng[$i],
                'namaBarang'=> $request->nama_barang[$i],
                'harga' => $request->harga[$i],
                'jmlBarang' => $request->jml_barang[$i],
                'keterangan' => $request->keterangan[$i],
            ]);
        }
        $user = Auth::user();
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
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pembelian = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        // dd($pembelian);
        return view('purchasing/pembelian/detaillunas', compact('pembelian', 'data_detail', 'profil'));
    }

    public function hutang($no_pengajuan)
    {
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pembelian = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        $profil = Profil::all();
        $no_pengajuan = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        // dd($no_pengajuan);
        $purchase = PO::all()->where('status','=','4');
        return view('purchasing/pembelian/hutang', compact('no_pengajuan','purchase', 'data_detail', 'pembelian', 'profil'));

    }

    public function bayar(Request $request, $no_pengajuan)
    {
        if ($request->jenisTransaksi == 'hutang') {
            Pembelian::where('no_pengajuan',$no_pengajuan)
                ->update([
                    'sisaBayar' => preg_replace('/[^0-9]/','',$request->sisabayar),
                    'totalBayar' => $request->totalBayar,

                ]);
        } else{
            Pembelian::where('no_pengajuan',$no_pengajuan)
                ->update([
                    'status' => $request->jenisTransaksi
                ]);
        }
        return redirect('purchasing/pembelian/invoice');
    }
}
