<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Teknisi | Sistem Service Kendaraan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/pages/auth.css">

    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2300);
        });    
    </script>

</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    
                    <h1 class="auth-title">Login Teknisi</h1>
                        @if (session('status'))
                            <div class="alert alert-success mt-3" role="alert"><span aria-hidden="true">&times;</span>
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('statusgagal'))
                            <div class="alert alert-danger mt-3" role="alert"><span aria-hidden="true">&times;</span>
                                {{ session('statusgagal') }}
                            </div>
                        @endif


                    <form action="{{ route('loginTeknisi') }}" method="POST">
                    @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control @error('email') is-invalid @enderror form-control-xl" name="email" id="email" class="form-control  form-control-xl" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-xl" name="password" id="password" class="form-control  form-control-xl" placeholder="Password" value="{{ old('password') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-8">
                        <p class="text-gray-600">Belum memiliki akun? <a href="teknisi/daftar"
                                class="font-bold">Daftar</a>.</p>
                        <p class="text-gray-600"> <a href="/loginPemilik"
                        class="font-bold">Login Pemilik Kendaraan</a>.</p>
                        
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