<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Home;
use App\Models\Instansi;
use App\Models\Master;
use App\Models\Peminjaman;
use App\Models\PO;
use App\Models\SupplierModel;
use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $nama_barang = Master::pluck('nama_barang');
        $users = Administrator::all();
        $stok = Master::pluck('stok');
        $data_po = PO::all();
        $supplier = SupplierModel::count();
        $instansi = Instansi::count();
        $master_data = Master::count();
        $user = User::count();
        $peminjaman = Peminjaman::all();
        return view('dashboard/home', compact(['nama_barang', 'stok','users','data_po','master_data', 'supplier', 'instansi', 'user', 'peminjaman']));
    }
    public function profil()
    {
        $users = Administrator::all();
        return view('admin/profile/profile', compact(['users']));
    }
    

    
}
