@extends('layout.main_teknisi')
@section('title', 'Data Teknisi | Sistem Kendaraan')
@section('header', 'Data Teknisi Kendaraan')
@section('content')
    <section class="section">
        <div class="card">
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card-header">
                        <h6 class="text-muted font-extrabold mb-0">Total Teknisi : {{ $jmlhTeknisi}}</h6>
                        
                    </div>
                </div>

                <div class="card-body">
                <!-- NOTIFIKASI berhasil update-->
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                    {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                <!-- NOTIFIKASI gagal update-->
                @if(session('statusgagal'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('statusgagal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif


                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr style="text-align:center;">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach( $dataTeknisi as $semuaTeknisi )
                            <tr>
                                <td scope="row" style="text-align:center;"width="80px">{{ $loop->iteration }}.</td>
                                <td width="200px">{{ $semuaTeknisi->nama }}</td>
                                <td width="200px">{{ $semuaTeknisi->telp }}</td>
                                <td width="220px">{{ $semuaTeknisi->email }}</td>
                                <td style="text-align:center;" width="100px">
                                    @if ( $semuaTeknisi->status == 'Aktif')
                                        <span class="badge bg-success" style="font-size: 12px;">Aktif</span>
                                        @else ($semuaTeknisi->status == 'Tidak Aktif')
                                        <span class="badge bg-danger" style="font-size: 12px;">Tidak Aktif</span>    
                                    @endif
                                </td>
                                <td style="text-align:center;">  
                                    <!-- Button MODAL DETAIL -->
                                    <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $semuaTeknisi->id}}"><i class="bi bi-pencil-square"></i>
                                    </button>
                                </td>

                                <!--scrolling content Modal DETAIL -->
                                <div class="modal fade" id="detail{{ $semuaTeknisi->id }}" tabindex="-1" role="dialog"
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
                                                <form action="/teknisi/dataTeknisi/{{ $semuaTeknisi->id }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <!--TAMPILKAN DATA Teknisi KENDARAAN -->
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="nama" style="color:#000;">Nama Lengkap</label>
                                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $semuaTeknisi->nama }}" placeholder="Nama Lengkap">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="telp" style="color:#000;">Telepon</label>
                                                            <input type="text" id="telp" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ $semuaTeknisi->telp }}" placeholder="Telepon">
                                                        </div>
                                                    </div>
                        
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email" style="color:#000;">Email</label>
                                                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $semuaTeknisi->email }}" placeholder="Email" disabled readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="alamat" style="color:#000;">Alamat</label>
                                                            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $semuaTeknisi->alamat }}" placeholder="Alamat">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="status" style="color:#000;">Status</label>
                                                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                                <option value="{{ $semuaTeknisi->status }}" selected>{{ $semuaTeknisi->status }}</option>
                                                                <optgroup label="-- Pilih Status --">
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- end tampil data -->
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

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-end">
                            <!-- halaman -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</section>    
@endsection