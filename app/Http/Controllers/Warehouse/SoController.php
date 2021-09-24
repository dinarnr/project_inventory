<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO;
use App\Models\Log;
use App\Models\Profil;

use App\Models\DetailPO;
use App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SoController extends Controller
{
    //
    public function dataSO()
    {
                $data_po_wh = PO::all()->where('status','>=', '1');
        $data_po = PO::all();
        return view('warehouse/so/data_so', compact('data_po', 'data_po_wh'));
    }

    public function detailso($no_PO)
    {  $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $profil = Profil::all();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('instansi');
        $user = Auth::user();
        $instansi = Instansi::where('nama_instansi', $nama_instansi)->get();
        return view('warehouse/so/detailso', compact('data_po', 'data_detail', 'user', 'profil', 'instansi', ));
    }

   public function addket(Request $request, $id_po )
    {
        // dd($request->edit_nama);
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
    
    public function confirmpo(Request $request)
    {
        // dd($request->is_active);
        $user = Auth::user();
        DetailPO::where('id_po', $request->is_active)
            ->update(
                [
                'status' => '2'
                ]
            );

        // DetailPO::whereIn('id_po', $request->is_active)
        // ->update(array(
        //         'status'=> '1'
        // ));  

        PO::where('no_PO', $request->no_PO)
            ->update(
                [
                    'status' => '2'
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Confirm PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('warehouse/po');
    }

    public function reject(Request $request)
    {
        $user = Auth::user();
        if ($user->divisi == "warehouse") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '1',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        } elseif ($user->divisi == "admin") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '3',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        }
        return back()->with('success', "Data telah ditolak");
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
