<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Kategori;

class KelolaPerbaikanController extends Controller
{
    public function indexKelola()
    {
        $dataPerbaikan = Service::all();
        return view('kelola perbaikan/index', compact('dataPerbaikan'));
    }

    public function prosesTambahService(Request $request)
    {
        $this->validate($request,[
            'teknisi_id' =>'required',
            'owner_id' =>'required',
            'kategori_id' =>'required',
            'keluhan1' =>'required',
            'waktu_mulai' =>'required',
        ]);

        Service::create([
            'teknisi_id' =>$request->teknisi_id,
            'owner_id' =>$request->owner_id,
            'kategori_id' =>$request->kategori_id,
            'keluhan1' =>$request->keluhan1,
            'waktu_mulai' =>$request->waktu_mulai,
        ]);
        
        return redirect('/kelola perbaikan/index')->with('status', 'Berhasil diinput');
    }

    public function editKelolaPerbaikan(Request $request, Service $dataPerbaikan)
    {
        $request->validate([
            'teknisi_id' =>'required',
            'keluhan2' =>'required',
            'total_harga' =>'required',
            'waktu_selesai' =>'required',
            'status' =>'required',
        ]);

        Service::where('id', $dataPerbaikan->id)->update([
            'teknisi_id' => $request->teknisi_id,
            'keluhan2' => $request->keluhan2,
            'total_harga' => $request->total_harga,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => $request->status
        ]);
        
        return redirect('/kelola perbaikan/index')->with('status', 'Data berhasil diubah');
    }
}
