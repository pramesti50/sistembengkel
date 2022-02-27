<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Owner;
use Auth;
use Session;

class OwnerController extends Controller
{

//LOGIN
    public function loginPemilik()
    {
        return view('loginPemilik');
    }

    public function prosesLoginPemilik(Request $request)
    {
        $emailpemilik = Owner::where('email', $request->email)->first();
        if(!$emailpemilik)
        {
            return redirect()->back()->with('statusgagal', 'Email Anda tidak terdaftar');
        }

        $passwordpemilik = Hash::check($request->password, $emailpemilik->password);
        if(!$passwordpemilik)
        {
            return redirect()->back()->with('statusgagal', 'Password Anda tidak sesuai');
        }

    //cek proses login
        $authpemilik= Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Aktif']);
        $idpemilik = Owner::where('email', $request->email)->value('id');
                
            session([
                'idloginpemilik' => $idpemilik,
            ]);
        
        if($authpemilik)
        {
            $request->session()->regenerate();
            
            return redirect()->intended('/owner');
        }
        else
        {
            return redirect()->back()->with('statusgagal', 'Akun Anda tidak terdaftar');
        }
    }

//LOGOUT 
    public function logoutOwner(Request $request)
    {
        Auth::guard('owner')->logout(); 
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('prosesLoginPemilik');
    }

//BERANDA
    public function indexDataOwner()
    {
        return view('owner/index');
    }

    
}
