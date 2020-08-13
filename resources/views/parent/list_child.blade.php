@extends('index')
@section('title','Daftar Anak')
@section('content')



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kontrol Anak</h1>
    </div>

    <div class="alert alert-info">
        <b>Info</b>
        <ul>
            <li>Anda bisa menambahkan list anak dengan menekan tombol Tambah Anak</li>
        </ul>
    </div>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Anak</h1>
    </div>
    @if($msg = Session::get('messageSuccess'))
    <div class="alert alert-success">
        {{ $msg }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    @endif
    @if($msg = Session::get('messageFailed'))
        <div class="alert alert-danger">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif
    @if($msg = Session::get('messageSuccessDeleteChild'))
        <div class="alert alert-success">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif
    @if($msg = Session::get('messageFailedDeleteChild'))
        <div class="alert alert-danger">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif
    <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addChildModal">Tambah Anak</button>
    </div>

    <div class="spacer" style="padding: 0 0 30px 0;"></div>
    <div class="row">

        <!-- Area Chart -->
        @foreach($getAllChild as $getAllChilds)
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="row card-body">
                    <img class="col-sm-6 img-fluid" src="{{ asset('img/'.$getAllChilds->photo) }}" alt="sans" />
                    <div class="col-sm-6">
                        <h5 class="card-title">{{ $getAllChilds->name }}</h5>
                        <p class="card-text">{{ $getAllChilds->birthday }}</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{ url('childlist/detailChild/'.$getAllChilds->id) }}" class="btn btn-primary">Kontrol</a>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ url('deletechild/'.$getAllChilds->id) }}" class="btn btn-danger" onclick="return confirm('Hapus anak ini?')">X</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>


@endsection


<!-- The Modal -->
<div class="modal fade" id="addChildModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Anak</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('addchild') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label><b>Nama Anak</b></label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Tanggal Lahir</b></label>
                        <input type="date" name="birthday" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Username (untuk login anak)</b></label>
                        <input type="text" name="username" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Password (untuk login anak)</b></label>
                        <input type="text" name="password" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Photo</b></label>
                        <input type="file" name="photo" class="form-control"    >
                    </div>
                    <input type="submit" class="btn btn-primary" value="Tambah" onclick="return confirm('Tambah anak ini?')">
                </form>
            </div>

        </div>
    </div>
</div>