<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembelianOfficeController extends Controller
{
    //
    public function pembelian()
    {
        return view('office/pembelian/pembelian');
    }
}
