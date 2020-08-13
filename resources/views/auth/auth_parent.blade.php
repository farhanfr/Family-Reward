@extends('auth.main_auth')

@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="row">
                                <div class="col-lg-12" style="background-color: #54C5F8;padding: 20% 0 20% 0 ">
                                    <center><h2 class="text-white"><b>Login untuk orang tua</b></h2></center>
                                </div>
                                <div class="col-lg-12" style="padding: 30px">
                                    <h4>Pilih User untuk login</h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <a href="{{ url('/') }}">
                                            <div class="card shadow" @php if (Request::segment(1) == '') echo 'style="background-color: #4e73df;color: white"' @endphp>
                                                <!-- Card Body -->
                                                <div class="card-body text-center">
                                                    <img src="{{ asset('img/father.png') }}">
                                                    <h5 style="padding-top: 10px;">Orang Tua</h5>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-xl-6">
                                            <a href="{{ url('tologinchild') }}">
                                            <div class="card shadow" >
                                                <!-- Card Body -->
                                                <div class="card-body text-center">
                                                    <img src="{{ asset('img/child.png') }}">
                                                    <h5 style="padding-top: 10px;">Anak</h5>
                                                </div>

                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    @if($msg = Session::get('messagefailed'))
                                    <div class="alert alert-danger">
                                        {{ $msg }}
                                    </div>
                                    @endif
                                </div>
                                    <form class="user" action="{{ url('/loginparent') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" required id="exampleInputPassword" placeholder="Masukkan password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                </form>
                                <hr>
                                <div class="text-center">
                                <a class="small" href="{{ url('toregisterparent') }}">Belum punya akun? Klik disini untuk registerasi</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection