<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Password Baru</title>
    <link href="{{url('public/logo')}}/LOGO YAFO aja.png" rel="icon">
    <link href="{{url('public/landingpage')}}/LOGO YAFO aja.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('public/arfa/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/arfa/toastr/toastr.min.css') }}">
    <style>
        .input-border-green .form-control {
            border-color: green;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px; /* Adjust the value as needed */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
       
        }
    </style>
</head>

<body class="background_login" style="background:green ;">

    <div class="header">
        <div class="container">
            <div class="header-body text-center mb-2 mt-5">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-2">
                        <p class="fw-bold mt-2 text-white" style="font-size: 13px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                    <center>
                            <img src="{{url('public/logo')}}/LOGO YAFO aja.png" class="logo" alt="" height="100px" width="60px">

                        </center>
                        <h1 class="fs-4 text-center fw-bold mb-4" style="color: green;">YAFO AGRO</h1>
                        <h4 class="fs-6 text-center fw-bold mt-1" style="color: green;">Pertanian Dalam Genggaman</h4>
                        @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert" id="notif">
                            <span data-notify="icon" class="fa fa-bell"></span>
                            <span data-notify="title">Gagal</span> <br>
                            <span data-notify="message">{{session()->get('error')}}</span>
                        </div>
                        @endif

                        <div class="card-body login-card-body">
                        <center>
                                <h6>
                                    <p style="color: green;" class="login-box-msg">Ubah Kata Sandi</p>
                                </h6>
                            </center>
                            <form action="{{url('password-baru/'.$token_reset)}}" method="post">
                                @csrf
                                <label for="username" style="color: green;">Ubah kata sandi baru</label>

                               <div class="mb-3">
                               <div class="input-group mb-3 input-border-green">
                                    <input type="text" class="form-control" name="password" value="{{ old('password')}}" id="password" placeholder="Password">
                                    <span class="input-group-text rounded-end password cursor-pointer input-border-green ">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                    
                                </div>
                               </div>
                              <div class="mb-3">
                              <label for="username" style="color: green;">Konfirmasi kata sandi abru</label>

                                        <div class="input-group mb-3 input-border-green">
                                            <input type="text" class="form-control" name="ulang_password" value="{{ old('ulang_password')}}" id="ulang_password" placeholder="Konfirmasi Password">
                                            <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                        
                                        </div>
                              </div>
                            
                              <div class="mt-4 d-grid gap-2 ">
                                <button type="submit" class="btn btn-success " style="background-color: green;color:#FDBB26;font-weight:bold">Simpan</button>
                            </div>
                            </form>
                      
                            <div class="d-flex align-items-center">
                                <a class="text-success  ms-0"></a>
                                <a href="{{url('login')}}">
                                    <p class="fs-8 mb-0">Sudah punya akun? Klik disini</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{url('public/arfa/toastr/toastr.min.js')}}"></script>
    <script>
        toastr.options.timeOut = 1500;
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';
        toastr.options.closeMethod = 'slideUp';
        @if(session()->has('success'))
            toastr.success('{{session()->get("success")}}')
        @elseif(session()->has('error'))
            toastr.error('{{session()->get("error")}}')
        @endif
    </script>
</body>

</html>
