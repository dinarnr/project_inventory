<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\DetailPengajuan;
use App\Models\Log;
use App\Models\Master;
use App\Models\Pembelian;
use App\Models\Pengajuan;
use App\Models\PO;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class PengajuanWarehouseController extends Controller
{
    public function tabelRetur(Request $request)
    {
        $data_retur = Pengajuan::all()->where('jenisBarang', '', 'Retur');
        return view('warehouse/pengajuan/brgretur', compact('data_retur'));
    }

    public function addretur()
    {
        $noPO = PO::all();
        $barang = Master::all();
        return view('pengajuan/addbrgretur', compact('noPO','barang'));
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
        return view('pengajuan/brgretur');
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
            'ip'=> $request->ip()

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
        return view('pengajuan/detailbaru', compact('pengajuan'));
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

    //-----------------------------------------pengajuan pembelian---------------------------------------------------------------//
    public function pengpembelian()
    {
        $pembelian= Pengajuan::all();
        return view('warehouse/pengajuan/pembelian', compact('pembelian'));
    }

    public function addpembelian()
    {
        $kode = strtoupper(substr("PEM", 0, 3));
        $check = count(Pengajuan::where('no_pengajuan', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $no_peng = $kode . "" . $angka;

        $pembelian= Pengajuan::all();
        $noPO =PO::all();
        $data_instansi = Instansi::all();
        // dd($no_peng);
    
        return view('warehouse/pengajuan/addpembelian', compact('pembelian','noPO','data_instansi', 'no_peng'));
    }

    public function addpengajuanpembelian(Request $request)
    {
    //    dd( $request->all());
       $jumlah_data = count($request->no_peng);
       for ($i = 0; $i < $jumlah_data; $i++) {
           DetailPengajuan::create(
               [
                   'no_pengajuan' => $request->no_peng[$i],
                   'jmlBarang' => $request->jumlah[$i],
                   'harga' => $request->harga[$i],
                   'kode_barang' => $request->kode_barang[$i],
                   'namaBarang' => $request->nama_barang[$i],
                   'keterangan' => $request->keterangan[$i],
               ]
           );
       }
           Pengajuan::create(
               [
                   'no_pengajuan' => $request->no_pengajuan,
                   'tgl_pengajuan' => $request->tgl_pengajuan,
                   'nama_pemohon' => $request->nama_pemohon,
               ]);
           
           $user = Auth::user();
           Log::create(
               [
               'name' => $user->name,
               'email' => $user->email,
               'divisi' => $user->divisi,
               'deskripsi' => 'Create Pengajuan Pembelian',
               'status' => '2',
               'ip'=> $request->ip()
           ]);

       return redirect('warehouse/pengajuan/pembelian');
    }

    public function detailpengajuanpembelian($no_peng)
    {
        $data_detail = DetailPengajuan::all()->where('no_pengajuan', $no_peng);
        $pengajuan = Pengajuan::all()->where('no_pengajuan', $no_peng);
        return view('warehouse/pengajuan/detailpengajuanpemb', compact('data_detail','pengajuan'));
    }
}
