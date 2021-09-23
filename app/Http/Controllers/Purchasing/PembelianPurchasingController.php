<?php

namespace App\Http\Controllers\Purchasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Pembelian;
use App\Models\PO;
use Illuminate\Support\Facades\Auth;

class PembelianPurchasingController extends Controller
{
    public function pembelian()
    {
        $lunas = Pembelian::all()->where('status','!=','hutang');
        $hutang = Pembelian::all()->where('status','','hutang');
        return view('purchasing/pembelian/invoice', compact('lunas','hutang'));
    }

    public function addinvoice($id_PO)
    {
        $data_pembelian = PO::find($id_PO);
        return view('purchasing/pembelian/addinvoice', compact('data_pembelian'));
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
        Pembelian::create([
            'no_PO' => $request->no_PO,
            'namaBarang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'tglBeli' => $request->tgl_beli,
            'harga' => $request->harga_jual,
            'supplier' => $request->supplier,
            'totalBayar' => $request->harga_beli,
            'status' => $request->jenisTransaksi,
            'sisaBayar' => $request->amount
        ]);
        PO::where('id_PO', $request->id_PO)
                ->update([
                    'status' => '5'
                ]);
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
        return redirect('warehouse/invoice');
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
}
