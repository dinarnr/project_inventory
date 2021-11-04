<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\DetailPengajuan;
use App\Models\Log;
use App\Models\Master;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Instansi;
use App\Models\Profil;
use DetailPengajuanTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanMarketingController extends Controller
{
    // ------------REKOM-----------
    public function tabelBaru(Request $request)
    {
        $data_baru = DetailPengajuan::all()->where('kode', '', 'rekomendasi');
        return view('marketing/pengajuan/brgbaru', compact('data_baru'));
    }

    public function addbaru()
    {
        return view('pengajuan/addbrgbaru');
    }

    public function prosesrekom(Request $request)
    {
        $user = Auth::user();
        if ($request->proses == 'proses') {
            DetailPengajuan::where('id_detailPengajuan', $request->is_active)
                ->update(
                    [
                        'status' => '2'
                    ]
                );
            Pengajuan::where('no_pengajuan', $request->no_peng)
                ->update(
                    [
                        'status' => '2'
                    ]
                );

            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Confirm Pengajuan Retur ',
                    'status' => '2',
                    'ip' => $request->ip()

                ]
            );
        } else {
            DetailPengajuan::where('id_detailPengajuan', $request->is_active)
                ->update(
                    [
                        'status' => '1'
                    ]
                );

            Pengajuan::where('no_pengajuan', $request->no_peng)
                ->update(
                    [
                        'status' => '1'
                    ]
                );

            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Confirm Draft pengajuan retur',
                    'status' => '2',
                    'ip' => $request->ip()

                ]
            );
        }
        return redirect('marketing/pengajuan/brgbaru');
    }

    public function editBaru($id_pengajuan)
    {
        $data_baru = Pengajuan::find($id_pengajuan);
        return view('pengajuan/editbrgbaru', compact('data_baru'));
    }

    public function updateBaru(Request $request)
    {
        $rules = [
            'edit_nama' => 'required',
        ];

        $messages = [
            'edit_nama.required' => '*Nama barang tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);
        Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
            ->update([
                'judul' => $request->edit_nama,
                'jumlah' => $request->edit_jumlah,
                'keterangan' => $request->edit_keterangan
            ]);

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Pengajuan Rekomendasi',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('/brgbaru');
    }
    public function deletebaru($id_pengajuan, Request $request)
    {
        // dd($id_jenis);
        // dd($id_master);
        // $data_kategori = Master::find($request->id_master);
        $baru = Pengajuan::where('id_pengajuan', $id_pengajuan)->first();
        // // dd($barang);
        $baru->delete();

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Pengajuan Rekomendasi',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        // //mengirim data_ktg ke view
        return back()->with('success', "Data telah terhapus");
    }

    public function detailbaru($no_pengajuan)
    {
        $profil = Profil::all();
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pengajuan_rekom = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        return view('/marketing/pengajuan/detailpengajuanrekom', compact('pengajuan_rekom', 'data_detail', 'profil'));
    }

    // -------------RETUR------------------
    public function tabelRetur()
    {
        $data_retur = Pengajuan::all()->where('jenisBarang', '', 'Retur');
        // dd($data_retur);
        return view('marketing/pengajuan/brgretur', compact('data_retur'));
    }

    public function addretur()
    {
        $noPO = PO::all();
        $barang = Master::all();
        return view('pengajuan/addbrgretur', compact('noPO', 'barang'));
    }

    public function proses(Request $request)
    {
        $centang = collect($request->is_active)->duplicates()->toArray();
        $uncentang = collect($request->is_active)->diff($centang)->toArray();
        $user = Auth::user();
        // dd($user);
        DetailPengajuan::whereIn('id_detailPengajuan', $centang)
            ->update(
                [
                    'status' => '2',
                ]
            );
        DetailPengajuan::whereIn('id_detailPengajuan', $uncentang)
            ->update(
                [
                    'status' => '0'
                ]
            );
        Pengajuan::where('no_pengajuan', $request->no_peng)
            ->update(
                [
                    'status' => '2'
                ]
            );
        Pengajuan::where('no_pengajuan', $request->no_peng)
            ->create(
                [
                    'pic_marketing' =>  $user->name,
                ]
            );

        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Confirm Pengajuan Retur ',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );

        return redirect('marketing/pengajuan/brgretur');
    }

    public function editRetur($id_pengajuan)
    {
        $data_baru = Pengajuan::find($id_pengajuan);
        return view('pengajuan/editbrgretur', compact('data_baru'));
    }

    public function updateRetur(Request $request)
    {
        Pengajuan::where('id_pengajuan', $request->edit_id_pengajuan)
            ->update([
                'noPO' => $request->edit_noPO,
                'namaBarang' => $request->edit_nama,
                'jmlBarang' => $request->edit_jumlah,
                'keterangan' => $request->edit_keterangan
            ]);

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Update Pengajuan Barang Retur',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('/brgretur');
    }
    public function deleteretur($id_pengajuan, Request $request)
    {
        // dd($id_jenis);
        // dd($id_master);
        // $data_kategori = Master::find($request->id_master);
        $baru = Pengajuan::where('id_pengajuan', $id_pengajuan)->first();
        // // dd($barang);
        $baru->delete();

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Pengajuan Barang Retur',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        // //mengirim data_ktg ke view
        return back()->with('success', "Data telah terhapus");
    }

    public function detailretur($no_pengajuan)
    {
        $profil = Profil::all();
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pengajuan_retur = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        return view('/marketing/pengajuan/detailpengajuanretur', compact('pengajuan_retur', 'data_detail', 'profil'));
    }

    //-----------------------------------------confirm/reject---------------------------------------------------------------//

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
                'ip' => $request->ip()

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
                'ip' => $request->ip()

            ]
        );

        return back()->with('success', "Data telah diperbarui");
    }

    //-----------------------------------------pengajuan pembelian---------------------------------------------------------------//
    public function pengpembelian()
    {
        $pembelian = Pengajuan::all()->where('jenisBarang', '', '');
        return view('marketing/pengajuan/pembelian', compact('pembelian'));
    }

    public function addpembelian()
    {
        $kode = strtoupper(substr("PEM", 0, 3));
        $check = count(Pengajuan::where('noPO', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%04d", (int)$check + 1);
        $no_peng = $kode . "" . $angka;

        $pembelian = Pengajuan::all();
        $noPO = PO::all();
        $data_instansi = Instansi::all();
        // dd($no_peng);

        return view('marketing/pengajuan/addpembelian', compact('pembelian', 'noPO', 'data_instansi', 'no_peng'));
    }

    public function addpembelian2(Request $request)
    {
        // dd( $request->kode_barang);
        $jumlah_data = count($request->no_peng);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPengajuan::create(
                [
                    'no_pengajuan' => $request->no_peng[$i],
                    'jumlah' => $request->jumlah[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'keterangan' => $request->keterangan[$i],
                ]
            );
        }
        Pengajuan::create(
            [
                'no_pengajuan' => $request->no_pengajuan,
                'nama_supplier' => $request->nama_supplier,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
            ]
        );

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Masuk Baru',
                'status' => '2',
                'ip' => $request->ip()
            ]
        );

        return redirect('marketing/pengajuan/pembelian');
    }

    public function detailpembelian($no_pengajuan)
    {
        $profil = Profil::all();
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pengajuan = Pengajuan::all()->where('no_pengajuan', $no_pengajuan);
        $no_peng = $no_pengajuan;
        // dd($no_peng);
        return view('/marketing/pengajuan/detailpengajuanpembelian', compact('pengajuan', 'data_detail', 'profil','no_peng'));
    }

    public function prosespembelian(Request $request, $no_pengajuan)
    {
        // dd('test2');
        // dd($no_pengajuan);
        $user = Auth::user();
        $centang = collect($request->is_active)->duplicates()->toArray();
        $uncentang = collect($request->is_active)->diff($centang)->toArray();
        // dd($centang);

                DetailPengajuan::whereIn('id_detailPengajuan', $centang)
                    ->update(
                        [
                        'status' => '2'
                        ]
                    );
                DetailPengajuan::whereIn('id_detailPengajuan', $uncentang)
                    ->update(
                        [
                        'status' => ''
                        ]
                    );
                Pengajuan::where('no_pengajuan', $no_pengajuan)
                    ->update(
                        [
                            'status' => '4',
                            'pic_marketing' => $user->name
                        ]
                    );
                
        
                Log::create(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'divisi' => $user->divisi,
                        'deskripsi' => 'Confirm Pengajuan Retur ',  
                        'status' => '2',
                        'ip' => $request->ip()
        
                    ]
                );

        return redirect('marketing/pengajuan/pembelian');
    }

    public function edit_jumlah(Request $request, $id_detailPengajuan)
    {
        dd('test');
        // dd($request);
        DetailPengajuan::where('id_detailPengajuan', $id_detailPengajuan)
            ->update([
                'jmlBarang' => $request->edit_jumlah
            ]);

        return back();
    }
}
