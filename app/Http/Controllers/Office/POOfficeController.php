<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPO;
use App\Models\PO;
use App\Models\Profil;
use  App\Models\Instansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class POOfficeController extends Controller
{
    //
    public function po()
    {
        $data_po = PO::all();
        return view('office/po/po', compact('data_po'));
    }

    public function searchBystatus(Request $request)
    {
        $search = $request->filter_status;
        $data_po = PO::where('status', 'LIKE', "%" . $search . "%")->get();
        return view('office/po/po', compact('data_po'));
    }

    public function detailpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $profil = Profil::all();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $no_PO)->sum('amount');
        $nama_instansi = PO::where('no_PO', $no_PO)->pluck('kode_instansi');
        $user = Auth::user();
        $instansi = Instansi::where('kode_instansi', $nama_instansi)->get();
        // dd($instansi);
        return view('office/po/detail', compact('data_po', 'data_detail', 'user', 'tanggal', 'total', 'instansi', 'profil'));
    }
}
