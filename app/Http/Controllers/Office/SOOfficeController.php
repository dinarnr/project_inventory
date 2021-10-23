<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\PO;
use App\Models\Profil;
use App\Models\DetailPO;
use App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SOOfficeController extends Controller
{
    //
    public function so()
    {
        $data_po_wh = PO::all()->where('status','>=', '1');
        $data_po = PO::all();
        return view('office/so/so', compact('data_po', 'data_po_wh'));
    }

    public function searchBystatus(Request $request)
    {
        $search = $request->filter_status;
        if($search != "all") {
            $data_po = PO::where('status', 'LIKE', "%" . $search . "%")->get();
        } else {
            $data_po = PO::all();
        }
        return view('office/so/so', compact('data_po'));
    }

    public function detailso($no_PO)
    {  
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $profil = Profil::all();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('kode_instansi');
        $user = Auth::user();
        $instansi = Instansi::where('kode_instansi', $nama_instansi)->get();
        return view('office/so/detailso', compact('data_po', 'data_detail', 'user', 'profil', 'instansi', ));
    }
}
