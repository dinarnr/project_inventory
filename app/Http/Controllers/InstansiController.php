<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstansiController extends Controller
{
    public function instansiview()
    {
        return view('instansi/instansi');
    }

    public function instansi()
    {
        $data_instansi = Instansi::all();
        return view('instansi/instansi', compact('data_instansi'));
        // return view('supplier/supplier');
    }

    public function add()
    {
        return view('instansi/addinstansi');
    }

    public function addInstansi(Request $request)
    {
        $rules = [
            'nama_instansi' => 'required',
            'email_instansi' => 'required',
            'pic_instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',
        ];

        $messages = [
            'nama_instansi.required' => '*Nama instansi tidak boleh kosong',
            'email_instansi.required' => '*Email tidak boleh kosong',
            'pic_instansi.required' => '*PIC tidak boleh kosong',
            'alamat_instansi.required' => '*Alamat tidak boleh kosong',
            'telp_instansi.required' => '*No telp tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);

        //Kode supp
        $kode = strtoupper(substr("INSTANSI", 0, 3));
        $check = count(Instansi::where('kode_instansi', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $kode_instansi = $kode . "" . $angka;

        Instansi::create([
            'kode_instansi'     =>  $kode_instansi,
            'nama_instansi'     =>  $request->nama_instansi,
            'email_instansi'    =>  $request->email_instansi,
            'pic_instansi'      =>  $request->pic_instansi,
            'alamat_instansi'   =>  $request->alamat_instansi,
            'telp_instansi'     =>  $request->telp_instansi

        ]);

        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Create Instansi',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        // return redirect('instansi');
        return back()->with('success', "Data telah terhapus");
        
    }

    public function addInstansi2(Request $request)
    {
        $rules = [
            'nama_instansi' => 'required',
            'email_instansi' => 'required',
            'pic_instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',
        ];

        $messages = [
            'nama_instansi.required' => '*Nama instansi tidak boleh kosong',
            'email_instansi.required' => '*Email tidak boleh kosong',
            'pic_instansi.required' => '*PIC tidak boleh kosong',
            'alamat_instansi.required' => '*Alamat tidak boleh kosong',
            'telp_instansi.required' => '*No telp tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);

        //Kode supp
        $kode = strtoupper(substr("INSTANSI", 0, 3));
        $check = count(Instansi::where('kode_instansi', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $kode_instansi = $kode . "" . $angka;

        Instansi::create([
            'kode_instansi'     =>  $kode_instansi,
            'nama_instansi'     =>  $request->nama_instansi,
            'email_instansi'    =>  $request->email_instansi,
            'pic_instansi'      =>  $request->pic_instansi,
            'alamat_instansi'   =>  $request->alamat_instansi,
            'telp_instansi'     =>  $request->telp_instansi

        ]);

        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Create Instansi',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect('/addpo');
        
    }

    public function editInstansi($id_instansi)
    {
        $data_instansi = Instansi::find($id_instansi);
        return view('instansi/editinstansi', compact('data_instansi'));
    }

    public function updateInstansi(Request $request)
    {

        Instansi::where('id_instansi', $request->edit_id_ins)
            ->update([
                'kode_instansi' => $request->edit_kode,
                'nama_instansi' => $request->edit_nama,
                'email_instansi' => $request->edit_email,
                'alamat_instansi' => $request->edit_alamat,
                'pic_instansi' => $request->edit_pic,
                'telp_instansi' => $request->edit_no
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Instansi',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect('instansi');

        return redirect()->back();
    }

    public function deleteinstansi($id_instansi, Request $request)
    {
        
        $data_instansi = Instansi::where('id_instansi', $id_instansi)->first();
        // dd($data_instansi);
        if ($data_instansi != null) {
            $data_instansi->delete();
            // //mengirim data_ktg ke view

            $user = Auth::user();
            Log::create(
                [
                'name' => $user->name,
                'email' => $user->email,
                'divisi' => $user->divisi,
                'deskripsi' => 'Delete Instansi',
                'status' => '2',
                'ip'=> $request->ip()

                ]
            );

            return back()->with('success', "Data telah terhapus");
        }
        return back()->with('success', "Wrong ID");
    }
   

}
