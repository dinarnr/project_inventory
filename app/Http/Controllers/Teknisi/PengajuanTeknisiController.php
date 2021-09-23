<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPengajuan;
use App\Models\Log;
use App\Models\Master;
use App\Models\Pengajuan;
use App\Models\PO;
use Illuminate\Support\Facades\Auth;


class PengajuanTeknisiController extends Controller
{
    //-----------------------------------------rekom---------------------------------------------------------------//    

    public function tabelRekom(Request $request)
    {
        $data_baru = Pengajuan::all()->where('jenisBarang', '', 'Baru');
        return view('teknisi/pengajuan/brgrekom', compact('data_baru'));
    }

    public function addrekom()
    {
        return view('teknisi/pengajuan/addrekom');
    }

    public function addrekom2(Request $request)
    {
        // $rules = [
        //     'namaBarang' => 'required',
        // ];

        // $messages = [
        //     'namaBarang.required' => '*Nama barang tidak boleh kosong',
        // ];
        // $this->validate($request);
        $baru = 'Baru';
        Pengajuan::create(
            [
                'judul' => $request->namaBarang,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'jenisBarang' => $baru
            ]
        );

        $user = Auth::user();
        Log::create(
            [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Create Pengajuan Rekomendasi',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('teknisi/pengajuan/brgrekom');
    }

    public function editRekom($id_pengajuan)
    {
        $data_baru = Pengajuan::find($id_pengajuan);
        return view('teknisi/pengajuan/editrekom', compact('data_baru'));
    }

    public function updateRekom(Request $request)
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
        return redirect('teknisi/pengajuan/brgrekom');
    }
    public function deleterekom($id_pengajuan, Request $request)
    {
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

    public function detailrekom($kode)
    {
        $data_detail = DetailPengajuan::all()->where('kode', $kode);
        return view('pengajuan/detailbaru', compact('data_detail'));

        $pengajuan = Pengajuan::all()->where('kode', $kode);
        return view('teknisi/pengajuan/detailrekom', compact('pengajuan'));
    }


    //-----------------------------------------retur---------------------------------------------------------------//    
    public function tabelRetur(Request $request)
    {
        $data_retur = Pengajuan::all()->where('jenisBarang', '', 'Retur');
        return view('teknisi/pengajuan/brgretur', compact('data_retur'));
    }

    public function addretur()
    {
        $noPO = PO::all();
        $barang = Master::all();
        return view('teknisi/pengajuan/addretur', compact('noPO','barang'));
    }

    public function addretur2(Request $request)
    {
        $user = Auth::user();

        // $rules = [
        //     'nama_pengajuan' => 'required',
        //     'TabelDinamis' => 'required'
        // ];

        // $messages = [
        //     'nama_pengajuan.required' => '*Nama pengajuan tidak boleh kosong',
        //     'TabelDinamis.required' => '*Data tidak boleh kosong'
        // ];
        // $this->validate($request);

        Pengajuan::create(
            [
                // 'kode' => $request->kode_pengajuan,
                'judul' => $request->nama_pengajuan,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'jenisBarang' => 'Retur',
                'pic_teknisi' => $user->name
            ]
        );
        $jumlah_data = count($request->nama_barang);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPengajuan::create(
                [
                    'kode' => $request->kode_pengajuan[$i],
                    'namaBarang' => $request->nama_barang[$i],
                    'jmlBarang' => $request->jumlah[$i],
                    'noPO' => $request->no_PO[$i],
                    'keterangan' => $request->keterangan[$i],
                    'jenisBarang' => 'Retur'
                ]
            );

            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Create Pengajuan Barang Retur',
                    'status' => '2',
                    'ip' => $request->ip()

                ]
            );
        }
        // return redirect('/brgretur');
        return view('teknisi/pengajuan/brgretur');
    }
    public function editRetur($id_pengajuan)
    {
        $data_baru = Pengajuan::find($id_pengajuan);
        return view('teknisi/pengajuan/editretur', compact('data_baru'));
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
            'ip'=> $request->ip()

            ]
        );
        return redirect('teknisi/pengajuan/brgretur');
    }
    public function deleteretur($id_pengajuan, Request $request)
    {
        $baru = Pengajuan::where('id_pengajuan', $id_pengajuan)->first();
        $baru->delete();

        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Delete Pengajuan Barang Retur',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        // //mengirim data_ktg ke view
        return back()->with('success', "Data telah terhapus");
    }

    public function detailretur($kode)
    {
        $data_detail = DetailPengajuan::all()->where('kode', $kode);
        return view('pengajuan/detailbaru', compact('data_detail'));

        $pengajuan = Pengajuan::all()->where('kode', $kode);
        return view('teknisi/pengajuan/detailretur', compact('pengajuan'));
    }
}
