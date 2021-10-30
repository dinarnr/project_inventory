<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function profil()
    {
        $profil = Profil::all();
        return view('warehouse/pengaturan/profil', compact('profil'));
    }

    public function updateProfil(Request $request)
    {
        Profil::where('id', $request->edit_id_profil)
        ->update([
            'nama'      => $request->edit_nama,
            'alamat'    => $request->edit_alamat,
            'email'     => $request->edit_email,
            'telp'     => $request->edit_no
        ]);
    return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
