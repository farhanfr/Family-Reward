@extends('index')
@section('title','Profile')
@section('content')

    <div class="col-xl-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Profile & edit profile</h6>
            </div>
            <!-- Card Body -->

            <div class="card-body">
                @if($msg=Session::get('messageSuccessUpdateProfile'))
                    <div class="alert alert-success">
                        {{ $msg }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                @foreach($dataParent as $dataParents)
                    <form action="{{ url('updateparentprofile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" required class="form-control" value="{{ $dataParents->id }}">
                        <div class="form-group">
                            <label><b>Nama Anda</b></label>
                            <input type="text" name="name" required class="form-control" value="{{ $dataParents->name }}">
                        </div>
                        <div class="form-group">
                            <label><b>No Tlp</b></label>
                            <input type="text" name="no_tlp" required class="form-control" value="{{ $dataParents->no_tlp }}">
                        </div>
                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input type="text" name="username" required class="form-control" value="{{ $dataParents->username }}">
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="text" name="password" required class="form-control" value="{{ $dataParents->password }}">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label><b>Foto Reward</b></label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="col-xl-6">
                                    <img src="{{ asset('img/'.$dataParents->photo) }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Ubah Data" onclick="return confirm('Edit profile ini?')">
                    </form>
                @endforeach
            </div>

        </div>
    </div>

@endsection