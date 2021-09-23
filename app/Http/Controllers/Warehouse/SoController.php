<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO;
use App\Models\Log;
use App\Models\DetailPO;
use Illuminate\Support\Facades\Auth;

class SoController extends Controller
{
    //
    public function dataSO()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        return view('warehouse/so/data_so', compact('data_po', 'data_po_wh'));
    }

    public function detailso($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        // $tanggal = Carbon::now();
        $user = Auth::user();
        return view('warehouse/so/detailso', compact('data_po', 'data_detail', 'user'));
    }

    public function addket(Request $request, $id_po )
    {
        DetailPO::where('id_po', $id_po)
            ->update([
                
                'keterangan' => $request->edit_keterangan
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Draft',
            'status' => '2',
            'ip'=> $request->ip()
            ]
        );
        return redirect()->back();
    }




    //---------------------Transaksi Instalasi----------------------------//
    // public function transaksiinstalasi($no_PO)
    // {
    //     $data_so = PO::all()->where('no_PO', $no_PO);
    //     $SO = PO::all();
    //     $instansi = Instansi::all();
    //     // dd($data_detail);
    //     return view('warehouse/so/transaksi_instalasi', compact('data_so', 'SO', 'brg', 'instansi')); 

    // }

    // public function fetch(Request $request, $no_PO){ 
    //     // dd($request);
    // $select = $request->get('select');
    // $values = $request->get('value');
    // $dependent = $request->get('dependent');

    // //    dd($dependent);
    // $data = DB::table('detail_PO')->where('no_SO', $values)->groupBy('nama_barang')->get();
    // $output = '<li></li>';
    //    foreach ($data as $row) {
    //        $output .= '<li>'.$row->nama_barang.'</li>';
    //    }
    //    echo $output;
    // }
}
