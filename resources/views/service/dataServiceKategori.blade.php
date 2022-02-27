@extends('layout.main_teknisi')
@section('title', 'Daftar Kategori Servis | Sistem Kendaraan')
@section('header', 'Data Kategori Servis')
@section('content')
    <section class="section">
        <div class="card">
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card-header">
                        <h6 class="text-muted font-extrabold mb-0">Total Data : {{ $jmlhServis}}</h6>
                        <a href="/service/tambahKategoriServis" class="btn btn-primary btn-sm mt-3">Tambah Kategori Service</a>
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
                                <th>Nama Servis</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach( $dataServis as $semuaServis )
                            <tr>
                                <td scope="row" style="text-align:center;">{{ $loop->iteration }}.</td>
                                <td>{{ $semuaServis->namaservis }}</td>
                                <td style="text-align:right;">{{ $semuaServis->harga }}</td>
                                <td style="text-align:center;">
                                    @if ( $semuaServis->status == 'Aktif')
                                        <span class="badge bg-success" style="font-size: 12px;">Aktif</span>
                                        @else ($semuaServis->status == 'Tidak Aktif')
                                        <span class="badge bg-danger" style="font-size: 12px;">Tidak Aktif</span>    
                                    @endif
                                </td>
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
                                                <form action="/service/dataServiceKategori/{{ $semuaServis->id }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <!--TAMPILKAN DATA Teknisi KENDARAAN -->
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="namaservis" style="color:#000;">Nama Servis</label>
                                                            <input type="text" id="namaservis" name="namaservis" class="form-control @error('namaservis') is-invalid @enderror" value="{{ $semuaServis->namaservis }}" placeholder="Nama Servis">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="harga" style="color:#000;">Harga (Rp)</label>
                                                            <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $semuaServis->harga }}" placeholder="Harga">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="status" style="color:#000;">Status</label>
                                                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                                <option value="{{ $semuaServis->status }}" selected>{{ $semuaServis->status }}</option>
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