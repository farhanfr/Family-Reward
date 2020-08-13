@extends('index')
@section('title','Dashboard Orang Tua')
@section('content')



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tugas Dibuat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $taskUndone }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
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
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Anak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $childCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reward Dibuat</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rewardAvailable }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gifts fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card Body -->
                <div class="card-body">
                    <h3>Selamat Datang Bapak / Ibu {{ Session::get('name') }}</h3>
                </div>

            </div>
        </div>


        <!-- Area Chart -->
        @foreach($childData as $childDatas)
            @if($childDatas->birthday == date('Y-m-d'))
        <div class="col-xl-4" style="margin-top: 30px;">
            <div class="card shadow" style="background-color: #3A60D0;color: white;">
                <!-- Card Body -->
                <div class="card-body">
                        <h5>Anak anda yang bernama {{ $childDatas->name }} hari ini berulang tahun</h5>
                </div>
            </div>
        </div>
            @endif
        @endforeach
    </div>


@endsection