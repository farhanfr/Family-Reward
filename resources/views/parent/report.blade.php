@extends('index')
@section('title','Report')
@section('content')

    <div class="col-xl-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Report</h6>
            </div>

            <div class="card-body">
                @if($msg=Session::get('messageSuccess'))
                    <div class="alert alert-success">
                        {{ $msg }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                    @if($msg=Session::get('messageFailed'))
                        <div class="alert alert-danger">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ url('addreport') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" required class="form-control">
                        <div class="form-group">
                            <label><b>Judul laporan</b></label>
                            <input type="text" name="title" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Deskripsi laporan</b></label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label><b>Foto laporan (opsional)</b></label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Laporkan Masalah" onclick="return confirm('Laporkan Masalah ini?')">
                    </form>

            </div>
        </div>
    </div>

@endsection