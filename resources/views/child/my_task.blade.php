@extends('index')
@section('title','Daftar Tugas')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tugas Ku</h1>
    </div>
    <div class="alert alert-info">
        <b>Catatan</b>
        <ul>
            <li>Jika tugas kamu selesai, kamu bisa memberitahu atau melaporkan tugas mu ke orangtua mu ya, agar bisa dinyatakan selesai</li>
        </ul>
    </div>

    <br>

    <div class="row">
        @foreach($getListTaskChild as $getListTaskChilds)
        <div class="col-xl-4">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tgl Mendapatkan Tugas : {{ $getListTaskChilds->date_send }}</h6>
                </div>
                <!-- Card Body -->

                <div class="card-body">
                        <img src="{{ asset('img/'.$getListTaskChilds->photo) }}" class="img-fluid">
                    <br>
                    <br>
                    <h4 class="text-primary">{{ $getListTaskChilds->name }}</h4>
                    <h6 class="text-success">Point tugas : <b>{{ $getListTaskChilds->point_task }}</b></h6>
                    <hr>
                    <p>{{ $getListTaskChilds->desc }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection