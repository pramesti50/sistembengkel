<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Teknisi;
use App\Models\Service;
use Auth;
use Session;

class TeknisiController extends Controller
{
//DAFTAR
    public function indexDaftar()
    {
        return view('teknisi/daftar');
    }


    public function prosesDaftar(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email:dns',
            'nama' =>'required|max:35',
            'telp' =>'required|max:13',
            'alamat' =>'required',
            'password' => 'required|min:5|max:10',
            'konfirmpass' => 'required|min:5|max:10'
        ]);
        

        if($request->password === $request->konfirmpass)
        {
            Teknisi::create([
                'email' =>$request->email,
                'nama' =>$request->nama,
                'telp' =>$request->telp,
                'alamat' =>$request->alamat,
                'password' => Hash::make($request->password)
            ]);
            
            return redirect('/index')->with('status', 'Registrasi berhasil, silahkan Login');
        }
        else
        {
            return back()->with('status', 'Gagal Registrasi Akun');
        }
    }



//LOGIN
    public function indexLogin()
    {
        return view('index');
    }

    public function prosesLogin(Request $request)
    {
        $emailteknisi = Teknisi::where('email', $request->email)->first();
        if(!$emailteknisi)
        {
            return redirect()->back()->with('statusgagal', 'Email Anda tidak terdaftar');
        }

        $passwordteknisi = Hash::check($request->password, $emailteknisi->password);
        if(!$passwordteknisi)
        {
            return redirect()->back()->with('statusgagal', 'Password Anda tidak sesuai');
        }

    //cek proses login
        $authteknisi = Auth::guard('teknisi')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Aktif']);
        $idteknisi = Teknisi::where('email', $request->email)->value('id');
                
            session([
                'idloginteknisi' => $idteknisi,
            ]);
        
        if($authteknisi)
        {
            $request->session()->regenerate();
            
            return redirect()->intended('/teknisi/beranda');
        }
        else
        {
            return redirect()->back()->with('statusgagal', 'Akun Anda tidak terdaftar');
        }
    }

    public function indexBeranda()
    {
        return view('teknisi/beranda');
    }

//LOGOUT 
    public function logoutTeknisi(Request $request)
    {
        Auth::guard('teknisi')->logout(); 
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginTeknisi');
    }

//DATA TEKNISI SEMUA
    public function indexDataTeknisi()
    {
        $jmlhTeknisi = Teknisi::all()->count();
        $dataTeknisi = Teknisi::all();
        return view('teknisi/dataTeknisi', compact (['jmlhTeknisi', 'dataTeknisi']));
    }

    public function editTeknisi(Request $request, Teknisi $dataTeknisi)
    {
        $request->validate([
            'nama' =>'required',
            'telp' =>'required',
            'alamat' =>'required',
            'status' =>'required'
        ]);

        Teknisi::where('id', $dataTeknisi->id)->update([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        
        return redirect('/teknisi/dataTeknisi')->with('status', 'Data Akun berhasil diubah');
    }

//MANAJEMEN KERJA
    public function indexKerja(Request $request)
    {
        $idteknisi = $request->session()->get('idloginteknisi');
        $dataPerbaikan = Service::where('teknisi_id', $idteknisi)->orderBy('id', 'desc')->paginate(20);
        
        return view('teknisi/manajemenKerja', compact('dataPerbaikan'));
    }
}
