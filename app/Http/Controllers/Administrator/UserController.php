<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    // public function index()
    // {
    //     return view('administrator/user');
    // }

    public function users()
    {
        $users = User::all();
        return view('administrator/user', compact('users'));
        // return view('supplier/supplier');
    }
    public function addadmin()
    {
        return view('administrator/addadmin');
    }
    public function addadmin2(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'divisi' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password Barang tidak boleh kosong',
            'divisi.required' => 'Divisi tidak boleh kosong',

        ];
        $this->validate($request, $rules, $messages);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'divisi'    => $request->divisi
        ]);
        return back();
    }
    public function editUser($id)
    {
        $users = User::find($id);
        return view('administrator/update', compact('users'));
    }

    public function updateUser(Request $request)
    {
        User::where('id', $request->edit_id)
        ->update([
            'name'      => $request->edit_nama,
            'email'     => $request->edit_email,
            // 'password' => $request->edit_password,
            'divisi'    => $request->edit_divisi,
            'status'    => $request->edit_status
        ]);
    return redirect('administrator/user');
    }

    public function updateProfil (Request $request)
    {
        // dd($request);
        if ($request->gambar and $request->edit_password){
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/logo'), $namaFile);

            User::where('id', $request->edit_id)
            ->update([
                'name'      => $request->edit_nama,
                'email'     => $request->edit_email,
                'gambar'    => $namaFile,
                'password' => bcrypt($request->edit_password)
        ]);
        } else if ($request->gambar) {
            $namaFile = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/logo'), $namaFile);

            User::where('id', $request->edit_id)
            ->update([
                'name'      => $request->edit_nama,
                'email'     => $request->edit_email,
                'gambar'    => $namaFile,
                'password'  => $request->password
        ]);
        }else {

            User::where('id', $request->edit_id)               
             ->update([
                'name'      => $request->edit_nama,
                'email'     => $request->edit_email,
                'password' => bcrypt($request->edit_password)
            ]);
        }
        return redirect('admin/profile/profile')->with(['success' => 'Data Berhasil Disimpan!']); 
    }
    public function resetPassword(Request $request)
    {
        User::where('id', $request->edit_id)
        ->update([
            
            'password' =>   '123456'
        ]);
    return redirect('administrator/user');
    }
}