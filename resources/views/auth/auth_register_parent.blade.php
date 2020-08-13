@extends('auth.main_auth')

@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background-color: #54C5F8;padding: 20% 0 20% 0 ">
                            <center><h2 class="text-white"><b>Register orang tua</b></h2></center>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    @if($msg = Session::get('errorMessage'))
                                        <div class="alert alert-danger">
                                            {{ $msg }}
                                        </div>
                                    @endif
                                    @if($msg = Session::get('messageFailedRegister'))
                                        <div class="alert alert-danger">
                                            {{ $msg }}
                                        </div>
                                    @endif
                                        @if($msg = Session::get('messageSuccessRegister'))
                                            <div class="alert alert-success ">
                                                {{$msg}} <a href="{{ url('/') }}">Login</a>
                                            </div>
                                        @endif
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                </div>
                                <form class="user" action="{{ url('registerparent') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user" required  placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="no_tlp" class="form-control form-control-user" required placeholder="Masukkan no hp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" required placeholder="Masukkan username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" required placeholder="Masukkan password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Register">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ url('/') }}">Sudah punya akun</a>
                                </div>
                                <br>
                                <div class="alert alert-info">
                                    <b>Info</b>
                                    <br>
                                    Untuk akun anak bisa dibuat nanti di dalam dashboard
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection