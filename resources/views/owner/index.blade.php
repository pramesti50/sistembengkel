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

<h5>Riwayat Servis Kendaraan Saya</h5>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr style="text-align:center;">
                                <th>No.</th>
                                <th>Nama Owner</th>
                                <th>Kategori Servis</th>
                                <th>Harga</th>
                                <th>Waktu Mulai</th>
                                <th>Status</th>
                                <th>Waktu Selesai</th>
                                <th>Total Harga</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                        @foreach( $dataPerbaikan as $semuaServis )
                            <tr>
                                <td scope="row" style="text-align:center;"width="80px">{{ $loop->iteration }}.</td>
                                <td width="200px">{{ $semuaServis->owner->nama }}</td>
                                <td width="200px">{{ $semuaServis->kategori->namaservis }}</td>
                                <td width="200px">{{ $semuaServis->kategori->harga }}</td>
                                <td width="220px">{{ $semuaServis->waktu_mulai }}</td>
                                <td style="text-align:center;" width="100px">
                                    @if ( $semuaServis->status == 'Sedang Dikerjakan')
                                        <span class="badge bg-danger" style="font-size: 12px;">Sedang Dikerjakan</span>
                                        @else ($semuaServis->status == 'Selesai')
                                        <span class="badge bg-success" style="font-size: 12px;">Selesai</span>    
                                    @endif
                                </td>
                                <td width="220px">{{ $semuaServis->waktu_selesai }}</td>
                                <td width="220px">{{ $semuaServis->total_harga }}</td>
                            
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
            
@endsection