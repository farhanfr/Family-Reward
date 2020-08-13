@extends('index')
@section('title','Daftar Reward')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reward yang disediakan untuk kamu</h1>
    </div>

    <div class="alert alert-info ">
        <b>Catatan</b>
        <ul>
            <li>Jika kamu ingin menukarkan reward, bilang ke orangtuamu juga ya :)</li>
        </ul>
    </div>

    <br>

    <div class="row">
        @foreach($getListRewardChild as $getListRewardChilds)
        <div class="col-xl-4">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                    <img src="{{ asset('img/'.$getListRewardChilds->photo) }}" class="img-fluid card-img-top">

                <!-- Card Body -->
                <div class="card-body">
                    <h4 class="text-primary">{{ $getListRewardChilds->name }}</h4>
                    <h6 class="text-success">Point yang dibutuhkan : <b>{{ $getListRewardChilds->point }}</b></h6>
                    <hr>
                    <p>{{ $getListRewardChilds->desc }}</p>
                </div>

            </div>
        </div>
            @endforeach
    </div>

@endsection