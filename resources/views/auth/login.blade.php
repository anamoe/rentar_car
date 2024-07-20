<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="{{url('logo')}}/LOGO YAFO aja.png" rel="icon">
    <link href="{{url('landingpage')}}/LOGO YAFO aja.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


    <link rel="stylesheet" href="{{asset('arfa/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('arfa/toastr/toastr.min.css') }}">
   
    <style>
        .input-border-green .form-control {
            border-color: #179bbd;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px; /* Adjust the value as needed */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
       
        }
    </style>

</head>

<!-- <body class="background_login" style="background-image: url('{{ asset('public/FOTO/hijau.jpg') }}');"> -->
<body class="background_login" style="background:#179bbd ;">

    <div class="header">
        <div class="container">
            <div class="header-body text-center mb-2 mt-5">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-2">
                        <!-- <h1 class="fw-bold mt-5 text-black" style="font-size: 40px;">YAFOARGO</h1> -->
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
                        <!-- <img src="{{url('public/logo')}}/LOGO YAFO aja.png" class="logo" alt="" height="100px" width="60px"> -->

                        </center>
                        <h1 class="fs-4 text-center fw-bold mb-4" style="color: #179bbd;">RAHMANA RENT - CAR
                        </h1>
                        @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert" id="notif">

                            <span data-notify="icon" class="fa fa-bell"></span>
                            <span data-notify="title">Gagal</span> <br>
                            <span data-notify="message">{{session()->get('error')}}</span>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                            <strong>Gagal !</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <form action="{{url('login-post')}}" method="POST"  class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2  fw-bold " style="color: #179bbd;" for="email">Email</label>
                                <div class="input-group input-group-join mb-3 input-border-green">
                                    <input type="text" class="form-control" id="email" placeholder="Masukkan email" name="email" id="validationCustom01" required autofocus>
                                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp</span>
                                    <div class="invalid-feedback">
                                    email tidak boleh kosong
                                    </div>


                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class=" fw-bold" style="color: #179bbd;" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-join mb-3 input-border-green">

                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>


                                    <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>

                                    <span class="text-danger"></span>
                                    <div class="invalid-feedback">
                                        Password tidak boleh kosong
                                    </div>

                                </div>
                            </div>

                            <div class="mt-4 d-grid gap-2 ">
                                <button type="submit" class="btn btn-success" style="font-weight:bold;background-color: #179bbd;color:white">LOG IN</button>
                            </div>
                        </form>
                      
                        <!-- <div class="d-flex align-items-center">
                                <a class="text-success  ms-0" ></a>
                                <a href="{{url('lupa-password')}}">
                                <p class="fs-8 mb-0">Lupa Password? Klik disini</p>
                                </a>
                            </div> -->

                    </div>

                </div>
            </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{url('arfa/toastr')}}/toastr.min.js"></script>

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