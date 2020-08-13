<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Family Reward</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom fonts for this template-->
    <link href={{ asset('css/fontawesome-free/css/all.min.css')}} rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .introduction p{
            margin-top: 30px;
            font-size: 18px;
        }
        .screenshot-app{
            padding:  50px 120px 30px 120px;
        }
        .carousel-item:after {
            content:"";
            display:block;
            position:absolute;
            top: 430px;
            bottom:0;
            left:0;
            right:0;
            background:rgba(0,0,0,0.4);
        }
        .how-to-use{
            padding-top: 20px;
        }
    </style>

</head>

<body class="bg-gradient-primary">

<h1 class="text-center text-white font-weight-bold" style="letter-spacing: 15px;font-size: 60px;padding-top: 30px;">FAMILY REWARD</h1>

<div class="container">
    @yield('content')
</div>

<div class="container">
<div class="introduction">
    <h1 class="text-center text-white" style="padding-top: 10px;">Apa sih Family Reward Itu ?</h1>
    <p class="text-white text-center">Family Reward yaitu sebuah aplikasi berbasis website yang dikhususkan untuk keluarga yang dimana aplikasi ini menggunakan sistem reward , yang dimana diharapkan aplikasi ini dapat membantu orangtua untuk memberi reward atau hadiah kepada anak sebagai bentuk apresiasi, selain itu, diharapkan mampu membangun bonding alias kelengketan antara anggota keluarga karena hubungan yang bermakna dan pengasuhan yang suportif adalah kunci bagi anak-anak Indonesia </p>
</div>
</div>

<div class="container">
<div class="how-to-use">
    <h1 class="text-center text-white" style="padding-top: 10px;">Bagaimana Cara Menggunakan Family Reward ?</h1>
    <div class="col-lg-12" style="padding: 30px">
        <br>
        <div class="row">
            <div class="col-xl-6">

                    <div class="card shadow"  data-toggle="modal" data-target="#parenthowtouse" style="cursor: pointer">
                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <img src="{{ asset('img/father.png') }}">
                            <h5 style="padding-top: 10px;color: black">Orang Tua</h5>
                        </div>
                    </div>

            </div>
            <div class="col-xl-6">

                    <div class="card shadow" data-toggle="modal" data-target="#childhowtouse" style="cursor: pointer">
                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <img src="{{ asset('img/child.png') }}">
                            <h5 style="padding-top: 10px;color: black">Anak</h5>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
</div>


<div class="screenshot-app">
    <h1 class="text-center text-white" style="padding-top: 10px;padding-bottom: 30px;">Gambaran Family Reward</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kontrol Anak</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Dashboard Orang Tua</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion2.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Melaporkan Masalah</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion3.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Dashboard Anak</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion4.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tugas Anak</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion5.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Reward Anak</h5>
                </div>
                <img class="d-block w-100" src="{{ asset('img/promotion6.jpg') }}" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container">
    <div class="how-to-use">
        <h1 class="text-center text-white" style="padding-top: 10px;">Bagaimana? Menarik Bukan Family Reward</h1>
        <div class="col-lg-12" style="padding: 30px">
            <center>
                <button class="btn btn-info btn-lg" id="backtotop">Mari Bergabung</button>
            </center>
        </div>
    </div>
</div>



<!-- The Modal -->
<div class="modal fade" id="parenthowtouse">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cara Menggunakan Akun Orang Tua</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ol>
                    <li>Melakukan pendaftaran akun orang tua</li>
                    <li>Login</li>
                    <li>Terdapat 3 Menu :
                        <ul>
                            <li>Dashboard
                                <p>Berisi informasi-informasi umum</p>
                            </li>
                            <li>Pengaturan Anak</li>
                                <p>Berisi daftar anak dan pengaturan anak, dan di menu ini juga digunakan untuk mendaftar akun anak</p>
                            <li>Laporkan Masalah</li>
                                <p>Berisi form untuk melaporkan masalah jika ada bug atau error</p>
                        </ul>
                    </li>
                    <li>Logout</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="childhowtouse">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cara Menggunakan Akun Anak</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ol>
                    <li>Melakukan login (untuk akun sudah dibuat oleh orang tua)</li>
                    <li>Terdapat 3 Menu :
                        <ul>
                            <li>Dashboard Anak
                                <p>Berisi informasi-informasi umum</p>
                            </li>
                            <li>List Tugas</li>
                                <p>Berisi daftar Tugas yang dibuat oleh orang tua dan dibuat untuk menambah poin jika diselesaikan</p>
                            <li>List Reward</li>
                                <p>Berisi daftar reward yang dibuat oleh orang tua dan ditukarkan dengan jumlah poin yang didapatkan</p>
                        </ul>
                    </li>
                    <li>Logout</li>
                </ol>
            </div>

        </div>
    </div>
</div>





<!-- Bootstrap core JavaScript-->
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#backtotop").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

    });

</script>
</body>

</html>

