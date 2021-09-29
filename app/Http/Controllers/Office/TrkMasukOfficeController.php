<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrkMasukOfficeController extends Controller
{
    //
    public function transaksimasuk()
    {
        return view('office/barang/transaksimasuk');
    }
}
