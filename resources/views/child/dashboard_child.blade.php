@extends('index')
@section('title','Dashboard Anak')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tugas Belum Selesai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $taskUndone }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tugas Selesai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $taskDone }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reward Tersedia</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rewardAvailable }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-gift fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reward Terambil</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rewardTake }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-gifts fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>


    <div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pesan dari orang tua kamu</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @foreach($getMessage as $getMessages)
                {{ $getMessages->message }}
                    @endforeach
            </div>

        </div>
    </div>
    </div>




@endsection