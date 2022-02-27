@extends('layout.main_teknisi')
@section('title', 'Tambah Kategori Service | Sistem Servis Kendaraan')
@section('header', 'Tambah Kategori Service')
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
                        
                        <form class="{{ route('prosesTambahKategori') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="namaservis">Nama Servis</label>
                                    <input type="text" id="namaservis" name="namaservis" class="form-control @error('namaservis') is-invalid @enderror" value="{{ old('namaservis') }}" placeholder="Nama Servis" required>
                                    @error('namaservis') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

    
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="harga">Harga(Rp)</label>
                                    <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Harga (Rp)" required>
                                    @error('harga') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <div class="col-12 d-flex justify-content-end mt-3">
                                <a type="button" class="btn btn-secondary me-1 mb-1" href="/service/dataServiceKategori">Kembali</a>
                                <button type="submit" class="btn btn-success me-1 mb-1">Daftar</button>
                            </div>
                        
                        </form>
                        
                </div>
            </div>
        </div>
    </div>
    </section>    
@endsection