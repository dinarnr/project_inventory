<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function profil()
    {
        $profil = Profil::all();
        return view('warehouse/pengaturan/profil', compact('profil'));
    }


}
