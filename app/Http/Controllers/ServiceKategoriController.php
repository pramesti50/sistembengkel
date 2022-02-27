<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class ServiceKategoriController extends Controller
{
//INDEX
    public function indexKategoriServis()
    {
        $jmlhServis = Kategori::all()->count();
        $dataServis = Kategori::paginate(15);
        return view('service/dataServiceKategori', compact(['jmlhServis', 'dataServis']));
    }
    
//TAMBAH DATA
    public function indexTambahServis()
    {
        return view('service/tambahKategoriServis');
    }

    public function tambahKategori(Request $request)
    {
        $this->validate($request,[
            'namaservis' =>'required',
            'harga' =>'required',
        ]);

        Kategori::create([
            'namaservis' =>$request->namaservis,
            'harga' =>$request->harga,
        ]);
        
        return redirect('/service/tambahKategoriServis')->with('status', 'Berhasil menambahkan kategori servis');
    }



//EDIT DATA
    public function editKategoriServis(Request $request, Kategori $dataServis)
    {
        $request->validate([
            'namaservis' =>'required',
            'harga' =>'required',
            'status' =>'required'
        ]);

        Kategori::where('id', $dataServis->id)->update([
            'namaservis' => $request->namaservis,
            'harga' => $request->harga,
            'status' => $request->status
        ]);
        
        return redirect('/service/dataServiceKategori')->with('status', 'Data berhasil diubah');
    }
}
