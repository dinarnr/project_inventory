<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CekDivisi;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            
           
        ];
        $login = Auth::attempt(['email' => $request->email,'password' => $request->password, 'status' => '2']);
        $login2 = Auth::attempt(['email' => $request->email,'password' => $request->password, 'status' => '1']);
// dd($login2);
        if($login === TRUE ){
            // RateLimiter::hit($this->throttleKey());
            $user = Auth::user();
            Log::create(
                [
                    'deskripsi' => 'Login',
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'name' => $user->name,
                    'status' => '1',
                    'ip'=> $request->ip()
                    ]
                );
            $date = Carbon::now();
            User::where('email', $user->email)
                ->update([
                    'lastLogin' => $date->toDateTimeString(),
                    'lastIP' => $request->ip()
                ]);
            return redirect('/dashboard/home');

        }else{
            if($login2 == TRUE){
                    Auth::logout();
                    Session::flash('error', 'Akun belum AKTIF, silahkan hubungi Administrator');
                return redirect()->route('login');
            }else{
                //Login Fail
                    Session::flash('error', 'Email atau password salah');
                return redirect()->route('login');
            }
        }
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->gambar = 'user.png';
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->status = '1';
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout(Request $request)
    {
        $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Logout',
            'status' => '1',
            'ip'=> $request->ip()

            ]
        );
        $date = Carbon::now();
            User::where('email', $user->email)
                ->update([
                    'lastLogout' => $date->toDateTimeString(),
                    'lastIP' => $request->ip()
                ]);
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function throttleKey(Request $request)
    {
        return  Str::lower($request->email).'|'.$this->ip();
    }
}
