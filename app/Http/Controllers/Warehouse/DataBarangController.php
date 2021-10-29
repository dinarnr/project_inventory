<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenis;
use App\Models\kategori;
use App\Models\Log;
use App\Models\Master;
use App\Models\Stok;
use Illuminate\Support\Facades\Auth;

class DataBarangController extends Controller
{
    //
    // public function index()
    // {
    //     return view('warehouse/databrg'); 
    // }

    public function barang()
    {
        $barang = Master::all();
        $jenis = Jenis::all();
        $data_stok = Stok::all();

        if ($barang->stok = 5) {
            $alert = "<script>alert(stok hampir habis)</script>";
        }


        return view('warehouse/master/databrg', compact('barang', 'jenis', 'data_stok'));
    }

    public function addbarang()
    {
        $barang = Master::all();
        $kategori = kategori::all();
        // $jenis = Jenis::all();
        return view('warehouse/master/addbarang', compact('barang', 'kategori'));
    }

    public function addbarang2(Request $request)
    {
        $rules = [
            'nama_barang' => 'required',
        ];

        $messages = [
            'nama_barang.required' => '*Nama barang tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);

        if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/logo'), $namaFile);

            $kode = strtoupper(substr($request->nama_barang, 0, 3));
            $check = count(Master::where('kode_barang', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $kode_barang = $kode . "" . $angka;

            // dd($request->stok);
            Master::create([
                'kode_kategori' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'kode_barang' => $kode_barang,
                'stok' => $request->stok,
                'gambar' => $namaFile,
                'status' => $request->status
            ]);
        } else {

            $kode = strtoupper(substr($request->nama_barang, 0, 3));
            $check = count(Master::where('kode_barang', 'like', "%$kode%")->get()->toArray());
            $angka = sprintf("%03d", (int)$check + 1);
            $kode_barang = $kode . "" . $angka;

            Master::create([
                'kode_kategori' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'kode_barang' => $kode_barang,
                'stok' => $request->stok,
                'status' => $request->status
            ]);
            
        }
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Input Data Barang',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
            Stok::create(
                [
                    'nama_barang' => $request->nama_barang,
                    'stok' => $request->stok,
                    'stok_akhir' => $request->stok,
                    'kode_barang' => $kode_barang,
                    'keterangan' => 'Barang Ditambahkan'
                ]
            );
        return redirect('warehouse/barang')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function editBarang($id_master)
    {

        $brg = Master::find($id_master);
        $kategori = kategori::all();
        $jenis = Jenis::all();
        return view('warehouse/master/editbrg', compact('brg', 'kategori', 'jenis'));
    }

    public function updateBarang(Request $request)
    {
        $rules = [
            'edit_nama_barang' => 'required',
        ];

        $messages = [
            'edit_nama_barang.required' => 'Nama barang tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);

        if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/logo'), $namaFile);

            Master::where('id_master', $request->edit_id_brg)
                ->update([
                    'kode_kategori' => $request->edit_kode_kategori,
                    'nama_barang' => $request->edit_nama_barang,
                    'kode_barang' => $request->edit_kode_barang,
                    'kode_kategori' => $request->edit_kode_kategori,
                    'gambar' => $namaFile,
                    'status' => $request->edit_status
                ]);
        } else {

            Master::where('id_master', $request->edit_id_brg)
                ->update([
                    'kode_kategori' => $request->edit_kode_kategori,
                    'nama_barang' => $request->edit_nama_barang,
                    'kode_barang' => $request->edit_kode_barang,
                    'kode_kategori' => $request->edit_kode_kategori,
                    'status' => $request->edit_status
                ]);

            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Update Data Barang',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        }
        return redirect('warehouse/barang')->with(['success' => 'Data berhasil di update']);    
    }
}
