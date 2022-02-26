<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class KelolaOwnerController extends Controller
{
    public function indexDataPemilik()
    {
        $jmlhPemilik = Owner::all()->count();
        $dataOwner = Owner::all();
        return view('teknisi/dataPemilik', compact (['jmlhPemilik', 'dataOwner']));
    }

    //form daftar akun pemilik kendaraan
    public function indexTambahPemilik()
    {
        return view('teknisi/tambahPemilik');
    }

    public function prosesTambahPemilik(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email:dns',
            'nama' =>'required|max:35',
            'telp' =>'required|max:13',
            'alamat' =>'required',
            'password' => 'required|min:5|max:10',
            'konfirmpassteknisi' => 'required|min:5|max:10'
        ]);
        

        if($request->password === $request->konfirmpassteknisi)
        {
            Owner::create([
                'email' =>$request->email,
                'nama' =>$request->nama,
                'telp' =>$request->telp,
                'alamat' =>$request->alamat,
                'password' => Hash::make($request->password)
            ]);
            
            return redirect('/teknisi/dataPemilik')->with('status', 'Berhasil daftar');
        }
        else
        {
            return back()->with('status', 'Gagal daftar akun');
        }
    }

    public function editPemilik(Request $request, Owner $dataOwner)
    {
        $request->validate([
            'status' =>'required'
        ]);

        Owner::where('id', $dataOwner->id)->update([
            'status' => $request->status
        ]);
        
        return redirect('/teknisi/dataPemilik')->with('status', 'Data Akun berhasil diubah');
    }

}
