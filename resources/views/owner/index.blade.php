@extends('layout.main_owner')
@section('title', 'Beranda Owner |  Sistem Servis Kendaraan')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h5 class="display-6">Selamat Datang, {{ Auth::guard('owner')->user()->nama }}</h5>
                        <p class="lead" style="font-size:16px;">Solusi perbaikan kendaraan Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>
            
@endsection