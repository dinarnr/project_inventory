<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Mail\Email;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PDFController extends Controller
{
    public function email(Request $request)
    {
        $pdf = PDF::loadview('pdf')->save(public_path('pdf/nama.pdf'));
        // dd($pdf);
        $details = [
            'data'    => ''
        ];

        $email = $request->email;
        Mail::to($email)->send(new Email($details));

        return redirect()->back();

    }
}
