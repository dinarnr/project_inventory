<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanOfficeController extends Controller
{
    //
    public function peminjaman()
    {
        return view('office/peminjaman/peminjaman');
    }
}
