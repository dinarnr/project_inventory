<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class PengajuanAdminController extends Controller
{
    //
    public function pengpembelian()
    {
        $pembelian= Pengajuan::all();
        return view('admin/pengajuan/pengpembelian', compact('pembelian'));
    }
    
    public function Reject(Request $request)
    {
        $user = Auth::user();
        if ($user->divisi == "marketing") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'pic_marketing' => $user->name,
                    'status' => '1'
                ]);
        } elseif ($user->divisi == "warehouse") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'pic_warehouse' => $user->name,
                    'status' => '3'
                ]);
        } elseif ($user->divisi == "admin") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'pic_admin' => $user->name,
                    'status' => '5'
                ]);
            }

                $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Reject Pengajuan',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );

        return back()->with('success', "Data telah diperbarui");
    }

    public function Confirm(Request $request)
    {
        $user = Auth::user();
        if ($user->divisi == "marketing") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'noPO' => $request->edit_noPO,
                    'pic_marketing' => $user->name,
                    'status' => '2'
                ]);
        } elseif ($user->divisi == "warehouse") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'pic_warehouse' => $user->name,
                    'status' => '4'
                ]);
        } elseif ($user->divisi == "admin") {
            Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
                ->update([
                    'pic_admin' => $user->name,
                    'status' => '6'
                ]);
            Pembelian::create(
                [
                    'noPO' => $request->po
                ]

            );

        }
            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Confirm Pengajuan Retur',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );

        return back()->with('success', "Data telah diperbarui");
    }

   
}
