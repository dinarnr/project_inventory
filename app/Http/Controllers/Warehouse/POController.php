<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPO;
use App\Models\Log;
use App\Models\PO;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class POController extends Controller
{
    //
    public function index()
    {
        $data_po_wh = PO::all()->where('status', '1');
        $data_po = PO::all();
        return view('warehouse/po/po', compact('data_po', 'data_po_wh'));
    }

    public function confirmpo(Request $request)
    {
        // dd($request->input('aktif'));
        $user = Auth::user();
        // DetailPO::where('id_po', $request->is_active)
        //     ->update(
        //         [
        //         'status' => '2'
        //         ]
        //     );

        DetailPO::whereIn('id_po', $request->is_active)
        ->update(array(
                'status'=> '2'
        ));  

        PO::where('no_PO', $request->no_PO)
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
                'deskripsi' => 'Confirm PO',
                'status' => '2',
                'ip' => $request->ip()

            ]
        );
        return redirect('/po');
    }

    public function reject(Request $request)
    {
        $user = Auth::user();
        if ($user->divisi == "warehouse") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '1',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        } elseif ($user->divisi == "admin") {
            PO::where('id_PO', $request->edit_id_po)
                ->update([
                    'status' => '3',
                    'keterangan' => $request->keterangan,
                    'pic_warehouse' => $user->name
                ]);
            $user = Auth::user();
            Log::create(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'divisi' => $user->divisi,
                    'deskripsi' => 'Reject PO',
                    'status' => '2',
                    'ip' => $request->ip()
                ]
            );
        }
        return back()->with('success', "Data telah ditolak");
    }

    public function detailpo($no_PO)
    {
        $data_detail = DetailPO::where('no_PO', $no_PO)->get();
        $data_po = PO::where('no_PO', $no_PO)->get();
        $tanggal = Carbon::now();
        $user = Auth::user();
        return view('warehouse/po/detail', compact('data_po', 'data_detail', 'user', 'tanggal'));
    }

    public function addket(Request $request, $id_po )
    {
        DetailPO::where('id_po', $id_po)
            ->update([
                
                'keterangan' => $request->edit_keterangan
            ]);

            $user = Auth::user();
        Log::create(
            [
            'name' => $user->name,
            'email' => $user->email,
            'divisi' => $user->divisi,
            'deskripsi' => 'Update Draft',
            'status' => '2',
            'ip'=> $request->ip()

            ]
        );
        return redirect()->back();
    }
}
