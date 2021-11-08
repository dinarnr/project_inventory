<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPengajuan;
use App\Models\Log;
use App\Models\Master;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanTeknisiController extends Controller
{
    //-----------------------------------------rekom---------------------------------------------------------------//    

    public function tabelRekom(Request $request)
    {
        $data_baru = Pengajuan::all()->where('kode', '', 'rekomendasi');
        return view('teknisi/pengajuan/brgrekom', compact('data_baru'));
    }

    public function addrekom()
    {
        $noPO = PO::all();
        $barang = Master::all();

        $kode = strtoupper(substr("PEN", 0, 3));
        $check = count(Pengajuan::where('no_pengajuan', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_peng = $kode . "" . $angka;

        return view('teknisi/pengajuan/addrekom', compact('noPO','barang','no_peng'));
    }

    public function addrekom2(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $jumlah_data = count($request->no_peng);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPengajuan::create(
                [
                    'no_pengajuan' => $request->no_peng[$i],
                    'namaBarang' => $request->nama_barang[$i],
                    'jmlBarang' => $request->jumlah[$i],
                    'jenisBarang' => 'Rekomendasi'
                ]
            );
        }
            Pengajuan::create(
                [
                    'no_pengajuan' => $request->no_pengajuan,
                    'keterangan' => $request->keterangan,
                    'jenisBarang' => 'Rekomendasi',
                    'pic_teknisi' => $user->name
                ]
            );

            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Create Pengajuan Barang Rekom',
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

    // public function detailrekom($no_pengajuan)
    // {
    //     $profil = Profil::all();
    //     $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
    //     $pengajuan_rekom = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
    //     return view('teknisi/pengajuan/detailrekom', compact('pengajuan_rekom', 'data_detail', 'profil'));
    // }

    public function detailrekom($no_pengajuan)
    {
        $profil = Profil::all(); 
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pengajuan_rekom = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        return view('/teknisi/pengajuan/detailrekom', compact('pengajuan_rekom', 'data_detail', 'profil'));
    }


    //-----------------------------------------retur---------------------------------------------------------------//    
    public function tabelRetur()
    {
        $data_retur = Pengajuan::all()->where('jenisBarang','','Retur');
        return view('teknisi/pengajuan/brgretur', compact('data_retur'));
    }

    public function addretur()
    {
        $noPO = PO::all();
        $barang = Master::all();

        $kode = strtoupper(substr("PEN", 0, 3));
        $check = count(Pengajuan::where('no_pengajuan', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_peng = $kode . "" . $angka;

        return view('teknisi/pengajuan/addretur', compact('noPO','barang', 'no_peng'));
    }

    public function kode(Request $request){ 
        // dd($request);
        $select = $request->get('select');
        $values = $request->get('value');
        $dependent = $request->get('dependent');

        //    dd($dependent);
        $data = DB::table('master_data')->where('nama_barang', $values)->groupBy('kode_barang')->get();
        
        foreach ($data as $row) {
            $output = '<option value="'.$row->kode_barang.'">'.$row->kode_barang.'</option>';
        }
        echo $output;
    }

    public function addretur2(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $jumlah_data = count($request->no_peng);
        for ($i = 0; $i < $jumlah_data; $i++) {
            DetailPengajuan::create(
                [
                    'no_pengajuan' => $request->no_peng[$i],
                    'namaBarang' => $request->nama_barang[$i],
                    'kode_barang' => $request->kode_barang[$i],
                    'jmlBarang' => $request->jumlah[$i],
                    'jenisBarang' => 'Retur'
                ]
            );
        }
            Pengajuan::create(
                [
                    'no_pengajuan' => $request->no_pengajuan,
                    'noPO' => $request->no_PO,
                    'keterangan' => $request->keterangan,
                    'tgl_pengajuan' => $request->tgl_pengajuan,
                    'jenisBarang' => 'Retur',
                    'pic_teknisi' => $user->name
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
        return redirect('teknisi/pengajuan/brgretur');
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

    public function detailretur($no_pengajuan)
    {
        $profil = Profil ::all();
        $data_detail = DetailPengajuan::where('no_pengajuan', $no_pengajuan)->get();
        $pengajuan_retur = Pengajuan::where('no_pengajuan', $no_pengajuan)->get();
        return view('/teknisi/pengajuan/detailretur', compact('pengajuan_retur', 'data_detail', 'profil'));
    }
}
