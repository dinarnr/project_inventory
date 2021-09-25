<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Home;
use App\Models\Master;
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
        return view('dashboard/home', compact(['nama_barang', 'stok','users']));
    }
    public function profil()
    {
        $users = Administrator::all();
        return view('admin/profile/profile', compact(['users']));
    }
    

    
}
