<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    //
    public function supplier()
    {
        $data_supplier = SupplierModel::all();
        return view('supplier/supplier', compact('data_supplier'));
        // return view('supplier/supplier');
    }

    public function add()
    {
        return view('supplier/addsupplier');
    }

    public function editSup($id_supplier)
    {
        $data_supplier = SupplierModel::find($id_supplier);
        return view('supplier/edit', compact('data_supplier'));
    }

    public function updateSup(Request $request)
    {
        SupplierModel::where('id_supplier', $request->edit_id_sup)
            ->update([
                'kode_supplier' => $request->edit_kode,
                'nama_supplier' => $request->edit_nama,
                'email_supplier' => $request->edit_email,
                'alamat_supplier' => $request->edit_alamat,
                'pic_supplier' => $request->edit_pic,
                'telp_supplier' => $request->edit_no
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Supplier',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect('supplier');

        return redirect()->back();
    }

    public function addSupplier(Request $request)
    {
        $rules = [
            'nama_supplier' => 'required',
            'email_supplier' => 'required',
            'pic_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telp_supplier' => 'required',
        ];

        $messages = [
            'nama_supplier.required' => '*Nama supplier tidak boleh kosong',
            'email_supplier.required' => '*Email tidak boleh kosong',
            'pic_supplier.required' => '*PIC tidak boleh kosong',
            'alamat_supplier.required' => '*Alamat tidak boleh kosong',
            'telp_supplier.required' => '*No telp tidak boleh kosong',
        ];
        $this->validate($request, $rules, $messages);

        //Kode supp
        $kode = strtoupper(substr("SUPPLIER", 0, 3));
        $check = count(SupplierModel::where('kode_supplier', 'like', "%$kode%")->get()->toArray());
        $angka = sprintf("%03d", (int)$check + 1);
        $kode_supplier = $kode . "" . $angka;

        SupplierModel::create([
            'kode_supplier'     =>  $kode_supplier,
            'nama_supplier'     =>  $request->nama_supplier,
            'email_supplier'    =>  $request->email_supplier,
            'pic_supplier'      =>  $request->pic_supplier,
            'alamat_supplier'   =>  $request->alamat_supplier,
            'telp_supplier'     =>  $request->telp_supplier

        ]);

        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Create Supplier',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect('supplier');
        // return view('master/addjenis');
    }

    public function deletesupplier($id_supplier, Request $request)
    {
        
        $data_supplier = SupplierModel::where('id_supplier', $id_supplier)->first();
        // // dd($barang);
        $data_supplier->delete();
        // //mengirim data_ktg ke view

        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Delete Supplier',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );

        return back()->with('success', "Data telah terhapus");
    }
}
