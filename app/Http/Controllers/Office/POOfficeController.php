<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class POOfficeController extends Controller
{
    //
    public function po()
    {
        return view('office/po/po');
    }

}
