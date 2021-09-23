<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\DB;

class SoController extends Controller
{
    //
    public function dataSO()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        // dd($data_po_wh);
        return view('warehouse/so/data_so', compact('data_po', 'data_po_wh'));
    }




    //---------------------Transaksi Instalasi----------------------------//
    public function transaksiinstalasi($no_PO)
    {
        $data_so = PO::all()->where('no_PO', $no_PO);
        $SO = PO::all();
        $brg = DB::table('detail_PO')->groupBy('no_SO')->get();
        // dd($data_detail);
        return view('warehouse/so/transaksi_instalasi', compact('data_so', 'SO', 'brg')); 

    }

    public function fetch(Request $request){
        // dd($request);
    $select = $request->get('select');
    $values = $request->get('value');
    $dependent = $request->get('dependent');

    //    dd($dependent);
    $data = DB::table('detail_PO')->where('no_SO', $values)->groupBy('nama_barang')->get();
    $output = '<tr id="row"></tr>';
       foreach ($data as $row) {
           $output .= '<tr id="row"></td>
            <td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="'.$row->nama_barang.'"></td>
            </tr>';
       }
       echo $output;
    }
}
