@extends('index')
@section('title','Update reward')
@section('content')

    <div class="col-xl-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Tugas</h6>
            </div>
            <!-- Card Body -->

            <div class="card-body">
                @if($msg=Session::get('messageSuccessUpdateTask'))
                    <div class="alert alert-success">
                        {{ $msg }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                @foreach($getData as $getDatas)
                    <form action="{{ url('updatereward') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" required class="form-control" value="{{ $getDatas->id }}">
                        <input type="hidden" name="child_id" required class="form-control" value="{{ $getDatas->child_id }}">
                        <div class="form-group">
                            <label><b>Nama Reward</b></label>
                            <input type="text" name="name" required class="form-control" value="{{ $getDatas->name }}">
                        </div>
                        <div class="form-group">
                            <label><b>Deskripsi</b></label>
                            <textarea class="form-control" name="desc">{{ $getDatas->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Point Reward</b></label>
                            <input type="number" name="point" required class="form-control" value="{{ $getDatas->point }}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label><b>Foto Reward</b></label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="col-xl-6">
                                    <img src="{{ asset('img/'.$getDatas->photo) }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Ubah Data" onclick="return confirm('Edit reward ini?')">
                    </form>
                    @endforeach
            </div>

        </div>
    </div>

@endsection