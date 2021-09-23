<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO;
use Illuminate\Support\Facades\Auth;

class PoAdminController extends Controller
{
    //
    public function index()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        return view('admin/po/po', compact('data_po', 'data_po_wh'));
    }
}