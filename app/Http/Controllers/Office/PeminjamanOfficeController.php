<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanOfficeController extends Controller
{
    //
    public function peminjaman()
    {
        $peminjaman = Peminjaman::all();
        return view('office/peminjaman/peminjaman', compact('peminjaman'));
    }
}
