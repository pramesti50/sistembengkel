@extends('layout.main_teknisi')
@section('title', 'Daftar Akun Pemilik Kendaraan | Sistem Servis Kendaraan')
@section('header', 'Daftar Akun Pemilik Kendaraan')
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
                        
                        <form class="{{ route('TambahPemilik') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama lengkap" required>
                                    @error('nama') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email harus aktif dan benar" required>
                                    @error('email') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="telp">Telepon</label>
                                    <input type="text" id="telp" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" placeholder="Telepon harus aktif dan benar" required>
                                    @error('telp') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Tulis alamat lengkap Anda" value="{{ old('alamat') }}" required>
                                @error('alamat') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password terdiri 5-10 karakter" value="{{ old('password') }}" required>
                                @error('password') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="konfirmpassteknisi">Konfirmasi Password</label>
                                <input type="password" class="form-control @error('konfirmpassteknisi') is-invalid @enderror" id="konfirmpassteknisi" name="konfirmpassteknisi" placeholder="Password terdiri 5-10 karakter" value="{{ old('konfirmpassteknisi') }}" required>
                                @error('konfirmpassteknisi') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>


                            <div class="col-12 d-flex justify-content-end mt-3">
                                <button type="reset" class="btn btn-secondary me-1 mb-1">Reset</button>
                                <button type="submit" class="btn btn-success me-1 mb-1">Daftar</button>
                            </div>
                        
                        </form>
                        
                </div>
            </div>
        </div>
    </div>
    </section>    
@endsection