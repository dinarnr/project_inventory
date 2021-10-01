<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SOOfficeController extends Controller
{
    //
    public function so()
    {
        return view('office/so/so');
    }
}
