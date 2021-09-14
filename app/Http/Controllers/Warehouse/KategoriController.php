<?php

namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kategori;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    //
    public function kategori()
    {
        $data_kategori = kategori::all();
        return view('warehouse/master/kategori', compact('data_kategori'));
    }

    public function addkategori()
    {
        return view('warehouse/master/addkategori');
    }

    public function addkategori2(Request $request)
    {

        $rules = [
            'kategori' => 'required',
            'keterangan' => 'required',
        ];

        $messages = [
            'kategori.required' => '*nama kategori tidak boleh kosong',
            'keterangan.required' => '*keterangan tidak boleh kosong',

        ];
        $this->validate($request, $rules, $messages);

        $kode = strtoupper(substr("KTG", 0, 3));
        $check = count(Kategori::where('kode_kategori', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $kode_kategori = $kode . "" . $angka;

        Kategori::create([
            'kode_kategori' => $kode_kategori,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan
        ]);

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Data Kategori',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('warehouse/kategori'); 
    }

    public function editKategori($id_kategori)
    {

        $data_kategori = Kategori::find($id_kategori);
        return view('warehouse/master/editktg', compact('data_kategori'));
    }

    public function updateKategori(Request $request)
    {
        $rules = [
            'edit_kategori' => 'required',
            'edit_keterangan' => 'required',
        ];

        $messages = [
            'edit_kategori.required' => '*Nama kategori tidak boleh kosong',
            'edit_keterangan.required' => '*Keterangan tidak boleh kosong',

        ];
        $this->validate($request, $rules, $messages);


        Kategori::where('id_kategori', $request->edit_id_ktg)
            ->update([
                'kode_kategori' => $request->edit_kode,
                'kategori' => $request->edit_kategori,
                'keterangan' => $request->edit_keterangan
            ]);

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Data Kategori',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('warehouse/kategori');
    }

    public function deletekategori($id_kategori, Request $request)
    {
        $kategori = Kategori::where('id_kategori', $id_kategori)->first();
        $kategori->delete();

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Data Kategori',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return back()->with('success', "Data telah terhapus");
    }
}
