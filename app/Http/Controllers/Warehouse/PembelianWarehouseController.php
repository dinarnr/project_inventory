<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelian;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class PembelianWarehouseController extends Controller
{
    public function pembelian()
    {
        $lunas = Pembelian::all()->where('status','!=','hutang');
        $hutang = DetailPembelian::all()->where('jenisTransaksi','','angsuran');
        return view('warehouse/pembelian/invoice', compact('lunas','hutang')); 
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
        $data_pembelian = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pembelian = Pembelian::where('no_pengajuan', $no_pengajuan)->get();
        // dd($data_detail);
        // $user = Auth::user();
        $profil = Profil::all();
        // dd($pembelian);
        return view('warehouse/pembelian/detaillunas', compact('pembelian', 'lunas', 'profil', 'data_pembelian'));
    }

    public function hutang($id_pembelian)
    {
        $data_detail = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        $pembelian = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        $profil = Profil::all();
        $no_pengajuan = DetailPembelian::where('id_pembelian', $id_pembelian)->get();
        // dd($no_pengajuan);
        $purchase = PO::all()->where('status','=','4');
        return view('warehouse/pembelian/hutang', compact('no_pengajuan','purchase', 'data_detail', 'pembelian', 'profil'));

    }

    
}
