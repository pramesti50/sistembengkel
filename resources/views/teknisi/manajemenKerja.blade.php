@extends('layout.main_teknisi')
@section('title', 'Manajemen Kerja |  Sistem Servis Kendaraan')

@section('content')

<h5>Manajemen Kerja Saya</h5>
<h6>Teknisi: {{ Auth::guard('teknisi')->user()->nama }}</h6>
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
                                <th>Keterangan 1</th>
                                <th>Keterangan 2</th>
                                <th>Waktu Mulai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach( $dataPerbaikan as $semuaServis )
                            <tr>
                                <td scope="row" style="text-align:center;"width="80px">{{ $loop->iteration }}.</td>
                                <td>{{ $semuaServis->owner->nama }}</td>
                                <td>{{ $semuaServis->kategori->namaservis }}</td>
                                <td>{{ $semuaServis->keluhan1 }}</td>
                                <td>{{ $semuaServis->keluhan2 }}</td>
                                <td>{{ $semuaServis->waktu_mulai }}</td>
                                <td style="text-align:center;" width="100px">
                                    @if ( $semuaServis->status == 'Sedang Dikerjakan')
                                        <span class="badge bg-danger" style="font-size: 12px;">Sedang Dikerjakan</span>
                                        @else ($semuaServis->status == 'Selesai')
                                        <span class="badge bg-success" style="font-size: 12px;">Selesai</span>    
                                    @endif
                                </td>
                            
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