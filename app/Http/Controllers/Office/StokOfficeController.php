<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Illuminate\Http\Request;

class StokOfficeController extends Controller
{
    public function stok()
    {
        $stok = Master::all();
        return view('office/barang/stok', compact('stok'));
    }


}
