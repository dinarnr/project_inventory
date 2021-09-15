<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Log;
use App\Models\User;

class LogController extends Controller
{
    public function log()
    {
        $log = Log::all()->where('status', '=', '1')->sortByDesc("id_log");
        $log2 = Log::all()->where('status', '=', '2')->sortByDesc("id_log");
        return view('administrator/log', compact('log', 'log2'));
    }
}
