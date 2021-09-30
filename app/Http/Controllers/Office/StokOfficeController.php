<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StokOfficeController extends Controller
{
    public function stok()
    {
        return view('office/barang/stok');
    }
}
