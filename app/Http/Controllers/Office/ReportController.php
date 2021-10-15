<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Master;
use App\Models\PO;
use App\Models\SupplierModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $data_po = PO::all();
        $supplier = SupplierModel::count();
        $instansi = Instansi::count();
        $master_data = Master::count();
        $user = User::count();
        return view('office/report/report', compact('data_po','master_data', 'supplier', 'instansi', 'user'));
    }

    
    
}


