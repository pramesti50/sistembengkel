
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Teknisi | Sistem Servis Kendaraan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Daftar Akun Teknisi</h1>
                    <!-- <p class="auth-subtitle mb-5">Input your data to register to our website.</p> -->
                    
                    <form action="{{ route('daftarTeknisi') }}" method="POST">
                    @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('nama') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('telp') is-invalid @enderror" id="telp" name="telp" placeholder="Telepon" value="{{ old('telp') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('telp') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('alamat') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('konfirmpass') is-invalid @enderror" id="konfirmpass" name="konfirmpass" placeholder="Konfirmasi Password" value="{{ old('konfirmpass') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('konfirmpass') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah memiliki akun? <a href="/index"
                                class="font-bold">Login</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>