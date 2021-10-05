<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\PO;
use Illuminate\Http\Request;

class POOfficeController extends Controller
{
    //
    public function po()
    {
        $purchase_order = PO::all();
        return view('office/po/po', compact('purchase_order'));
    }

}
