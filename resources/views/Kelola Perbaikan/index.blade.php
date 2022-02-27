@extends('layout.main_teknisi')
@section('title', 'Kelola Perbaikan Kendaraan | Sistem Servis Kendaraan')
@section('header', 'Kelola Perbaikan Kendaraan')
@section('content')

<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <!-- NOTIFIKASI -->
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible show fade">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        
                        <form class="{{ route('prosesTambahService') }}" method="POST">
                        @csrf
                        <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="keluhan1">Keluhan Servis</label>
                                    <input type="text" id="keluhan1" name="keluhan1" class="form-control @error('keluhan1') is-invalid @enderror" value="{{ old('keluhan1') }}" placeholder="Keluhan Servis Kendaraan" required>
                                    @error('keluhan1') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        <div class="row">
                            

                            <div class="form-group col-md-6">
                                <label for="teknisi_id">Nama Teknisi</label>
                                <select name="teknisi_id" class="form-select" required>
                                    <option value="">--Data Teknisi--</option>
                                    <option value="1">Putri Pramesti</option>
                                    <option value="2">Gita Basudewi</option>
                                    <option value="3">Wirama Dwi Putra</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="kategori_id">Kategori Servis</label>
                                <select name="kategori_id" class="form-select" required>
                                    <option value="">--Kategori Servis--</option>
                                    <option value="1">Ganti Ban Mobil</option>
                                    <option value="2">Ganti Oli</option>
                                    <option value="3">Servis Jok mobil</option>
                                    <option value="4">Servis rem mobil</option>
                                    <option value="5">Ganti Aki Motor</option>
                                    <option value="6">Servis Audio Mobil</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="owner_id">Nama Owner</label>
                                <select name="owner_id" class="form-select" required>
                                    <option value="">--Data Nama Owner--</option>
                                    <option value="1">asrini</option>
                                    <option value="2">Satria Wiguna</option>
                                    <option value="3">Silvia Fransiska</option>
                                </select>
                            </div>

    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="waktu_mulai">Waktu Mulai</label>
                                    <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" class="form-control @error('waktu_mulai') is-invalid @enderror" value="{{ old('waktu_mulai') }}" required>
                                    @error('waktu_mulai') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <div class="col-12 d-flex justify-content-end mt-3">
                                <button type="reset" class="btn btn-secondary me-1 mb-1">Reset</button>
                                <button type="submit" class="btn btn-success me-1 mb-1">Proses</button>
                            </div>
                        </form>   
                </div>
            </div>
        </div>
    </div>
</section>


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
                                <th>Total Harga</th>
                                <th>Aksi</th>
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
                                <td width="220px">{{ $semuaServis->total_harga }}</td>
                                <td style="text-align:center;">  
                                    <!-- Button MODAL DETAIL -->
                                    <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $semuaServis->id}}"><i class="bi bi-pencil-square"></i>
                                    </button>
                                </td>

                                <!--scrolling content Modal DETAIL -->
                                <div class="modal fade" id="detail{{ $semuaServis->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white">Detail Akun</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        <i data-feather="x"></i>
                                                    </button>
                                            </div>
                      
                                        <!-- FORM EDIT DETAIL -->
                                            <div class="modal-body">
                                                <form action="/kelola perbaikan/index/{{ $semuaServis->id }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <!--TAMPILKAN DATA  -->
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        
                                                        <div class="form-group">
                                                            <label for="teknisi_id" style="color:#000;">Dikerjakan Teknisi</label>
                                                            <select name="teknisi_id" class="form-select @error('teknisi_id') is-invalid @enderror">
                                                                <option value="{{ $semuaServis->teknisi_id }}" selected>{{ $semuaServis->teknisi->nama }}</option>
                                                                <optgroup label="-- Pilih Teknisi --">
                                                                <option value="1">Putri Pramesti</option>
                                                                <option value="2">Gita Basudewi</option>
                                                                <option value="3">Wirama Dwi Putra</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="waktu_selesai" style="color:#000;">Waktu Selesai</label>
                                                            <input type="datetime-local" id="waktu_selesai" name="waktu_selesai" class="form-control @error('waktu_selesai') is-invalid @enderror" value="{{ $semuaServis->waktu_selesai }}" placeholder="Waktu Selesai">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="total_harga" style="color:#000;">Total Harga</label>
                                                            <input type="text" id="total_harga" name="total_harga" class="form-control @error('total_harga') is-invalid @enderror" value="{{ $semuaServis->total_harga }}" placeholder="Total Harga">
                                                        </div>
                                                    </div>
                        

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="status" style="color:#000;">Status</label>
                                                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                                <option value="{{ $semuaServis->status }}" selected>{{ $semuaServis->status }}</option>
                                                                <optgroup label="-- Pilih Status --">
                                                                <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                                                                <option value="Selesai">Selesai</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- end tampil data -->
                                                </div>
                                                
                                                <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="keluhan2" style="color:#000;">Keluhan Tambahan</label>
                                                            <input type="text" id="keluhan2" name="keluhan2" class="form-control @error('keluhan2') is-invalid @enderror" value="{{ $semuaServis->keluhan2 }}" placeholder="Keluhan tambahan">
                                                        </div>
                                                </div>

                                                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL DETAIL -->
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