<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function data_stok()
    {
        return view('warehouse/stok/data_stok');
    }
}
