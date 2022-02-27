<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Kategori;

class KelolaPerbaikanController extends Controller
{
    public function indexKelola()
    {
        return view('kelola perbaikan/index');
    }

    public function prosesService()
    {
        
    }
}
