<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\DetailPO;
use App\Models\Instansi;
use App\Models\PO;
use App\Models\Profil;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class PDFController extends Controller
{
    public function email(Request $request)
    {
        $data_detail = DetailPO::where('no_PO', $request->no_po)->get();
        $profil = Profil::all();
        $data_po = PO::where('no_PO', $request->no_po)->get();
        $tanggal = Carbon::now();
        $total = DetailPO::where('no_PO', $request->no_po)->sum('amount');
        $nama_instansi = PO::where('no_PO', $request->no_po)->pluck('kode_instansi');
        $user = Auth::user();
        $instansi = Instansi::where('kode_instansi', $nama_instansi)->get();

        // dd($pdf);
        $details = [
            'data'    => 'Detail Purchase Order'
        ];
        $email = $request->email;

        $pdf = PDF::loadview('pdf', compact('details', 'data_detail', 'instansi', 'data_po', 'user'))->save(public_path('pdf/nama.pdf'));
        Mail::to($email)->send(new Email($details));

        return redirect()->back();
    }

    public function cetak_pdf($id)
    {
        $data_detail = DetailPO::where('no_PO', $id)->get();
        $data_po = PO::where('no_PO', $id)->get();
        $nama_instansi = PO::where('no_PO', $id)->pluck('kode_instansi');
        $user = Auth::user();
        $instansi = Instansi::where('kode_instansi', $nama_instansi)->get();
        $tanggal = Carbon::now();

        // dd($data_po);
        
        $pdf = PDF::loadview('pdf', compact('data_detail', 'instansi', 'data_po', 'user'))->save(public_path('pdf/nama.pdf'));
        return $pdf->stream('Detail_PO_pdf.pdf');
    }
}
