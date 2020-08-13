@extends('index')
@section('title','Kontrol Anak')
@section('content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kontrol Anak</h1>
    </div>

    <div class="alert alert-info">
        <b>Catatan</b>
        <ul>
            <li>Data List Tugas dan List Reward ini hanya akan terlihat oleh anak bernama <b>{{ $getNameChild }}</b></li>
            <li>Pesan untuk anak akan tampil pada dashboard anak</li>
        </ul>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-5">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biodata Anak</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <div class="row">
                            @foreach($getDetailChild as $getDetailChilds)
                            <div class="col-lg-5">
                                <img src="{{ asset('img/'.$getDetailChilds->photo) }}" class="img-fluid rounded-circle" style="width: 200px;height: 150px">
                                <br>
                                <br>
                                <div>
                                    <center>
                                    <label class="text-center"><b>Jumlah Point</b></label>
                                    <p>{{ $getDetailChilds->child_point }}</p>
                                    </center>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div>
                                    <label><b>Nama</b></label>
                                    <p>{{ $getDetailChilds->name }}</p>
                                </div>
                                <div>
                                    <label><b>Tgl Lahir</b></label>
                                    <p>{{ $getDetailChilds->birthday }}</p>
                                </div>
                                <div>
                                    <label><b>Username</b></label>
                                    <p>{{ $getDetailChilds->username }}</p>
                                </div>
                                <div>
                                    <label><b>Password</b></label>
                                    <p>{{ $getDetailChilds->password }}</p>
                                </div>
                                <div>
                                    <a href="{{ url('childlist/getprofilechild/'.$getDetailChilds->id) }}" class="btn btn-primary">Ubah Data</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                </div>

            </div>
        </div>
        <div class="col-xl-7">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Log Aktifitas di kontrol anak</h6>
                </div>
                <div class="card-body" style="overflow-y: scroll">
                    <div class="chart-area">
                        @foreach($getActivityLog as $getActivityLogs)
                        <div class="alert alert-warning">
                            <b>{{ $getActivityLogs->activity }}</b>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

    <div class="row">
        <div class="col-xl-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Tugas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if($msg=Session::get('messageSuccess'))
                <div class="alert alert-success">
                    {{ $msg }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                @endif
                    @if($msg=Session::get('messageSuccessDeleteTask'))
                        <div class="alert alert-success">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                <button class="btn btn-success" data-toggle="modal" data-target="#addTask">Tambah Tugas</button>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered display"  width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tugas</th>
                            <th>Deskripsi</th>
                            <th>Point Tugas</th>
                            <th>Photo</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($getListTask as $getListTasks)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $getListTasks['name'] }}</td>
                            <td>{{ $getListTasks->desc }}</td>
                            <td>{{ $getListTasks->point_task }}</td>
                            <td><img src="{{ asset('img/'.$getListTasks->photo) }}" class="img-fluid" style="width: 100px;height: 70px;"></td>
                            <td>
                                <a href="{{ url('childlist/getdetailtask/'.$getListTasks->id) }}" class="btn btn-info">Ubah</a>
                                <a href="{{ url('addtaskdone/'.$getListTasks->id) }}" class="btn btn-success" onclick="return confirm('Selesaikan tugas ini ?')">Selesai</a>
                                <a href="{{ url('deletetask/'.$getListTasks->id) }}" class="btn btn-danger" onclick="return confirm('Yakin hapus tugas ini?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Reward</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if($msg=Session::get('messageSuccessReward'))
                        <div class="alert alert-success">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                        @if($msg=Session::get('messageFailedReward'))
                            <div class="alert alert-danger">
                                {{ $msg }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                        @endif
                        @if($msg=Session::get('messageSuccessDeleteReward'))
                            <div class="alert alert-success">
                                {{ $msg }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                        @endif
                    <button class="btn btn-success" data-toggle="modal" data-target="#addRewards">Tambah Rewards</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered display"  width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Reward</th>
                                <th>Deskripsi</th>
                                <th>Point Dibutuhkan</th>
                                <th>Photo</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($getListReward as $getListRewards)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getListRewards->name }}</td>
                                <td>{{ $getListRewards->desc }}</td>
                                <td>{{ $getListRewards->point }}</td>
                                <td><img src="{{ asset('img/'.$getListRewards->photo) }}" class="img-fluid" style="width: 100px;height: 80px;"></td>
                                <td>
                                    <a href="{{ url('childlist/getdetailreward/'.$getListRewards->id )}}" class="btn btn-info">Ubah</a>
                                    <a href="{{ url('addrewarddone/'.$getListRewards->id) }}"
                                       class="btn btn-success" onclick="return confirm('Ambil hadiah ini ?')">Ambil</a>
                                    <a href="{{ url('deletereward/'.$getListRewards->id) }}" class="btn btn-danger" onclick="return confirm('Hapus reward ini?')">Hapus</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pesan untuk anak</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if($msg=Session::get('messageFailedMsg'))
                        <div class="alert alert-danger">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    @if($msg=Session::get('messageSuccessMsg'))
                        <div class="alert alert-success">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    <h5>Pesan saat ini :</h5>
                    <div class="alert alert-success">
                        {{ isset($getMessageChild['message']) ? $getMessageChild['message'] : "" }}
                    </div>
                    <hr>
                    <form action="{{ url('addMessage') }}" method="post">
                        @csrf
                        <input type="hidden" name="child_id" value="{{ $getIdChild }}">
                        <textarea class="form-control" required name="message"></textarea>
                        <br>
                        <input type="submit" class="btn btn-success" value="Tetapkan Pesan" onclick="return confirm('Masukkan pesan ini ?');">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tugas Selesai</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if($msg=Session::get('messageSuccessDeleteTaskDone'))
                        <div class="alert alert-success">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered display" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tugas</th>
                                <th>Deskripsi</th>
                                <th>Point tugas</th>
                                <th>Photo</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($getTaskDone as $getTaskDones)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $getTaskDones->name }}</td>
                                    <td>{{ $getTaskDones->desc }}</td>
                                    <td>{{ $getTaskDones->point_task }}</td>
                                    <td><img src="{{ asset('img/'.$getTaskDones->photo) }}" class="img-fluid" style="width: 100px;height: 70px;"></td>
                                    <td>
                                        <a href="{{ url('deletetaskdone/'.$getTaskDones->id) }}" class="btn btn-danger" onclick="return confirm('Yakin hapus item ?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reward diambil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if($msg=Session::get('messageSuccessDeleteRewardDone'))
                        <div class="alert alert-success">
                            {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered display" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Reward</th>
                                <th>Deskripsi</th>
                                <th>Point Reward</th>
                                <th>Photo</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($getRewardDone as $getRewardDones)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $getRewardDones->name }}</td>
                                    <td>{{ $getRewardDones->desc }}</td>
                                    <td>{{ $getRewardDones->point }}</td>
                                    <td><img src="{{ asset('img/'.$getRewardDones->photo) }}" class="img-fluid" style="width: 100px;height: 70px;"></td>
                                    <td>
                                        <a href="{{ url('deleterewarddone/'.$getRewardDones->id) }}" class="btn btn-danger" onclick="return confirm('Yakin hapus item ?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="spacer" style="padding: 30px 0 30px 0"></div>

@endsection

<div class="modal fade" id="addRewards">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Reward</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('addReward') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="child_id" required class="form-control" value="{{ $getIdChild }}">
                    <div class="form-group">
                        <label><b>Nama Reward</b></label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Deskripsi</b></label>
                        <textarea class="form-control" required name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label><b>Point Reward</b></label>
                        <input type="number" name="point" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Image</b></label>
                        <input type="file" name="photo"class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Tambah" onclick="return confirm('Tambah Tugas ini?')">
                </form>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="addTask">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tugas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('addTask') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="child_id" required class="form-control" value="{{ $getIdChild }}">
                    <div class="form-group">
                        <label><b>Nama Tugas</b></label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Deskripsi</b></label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label><b>Point Tugas</b></label>
                        <input type="number" name="point_task" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Image</b></label>
                        <input type="file" name="photo"class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Tambah" onclick="return confirm('Tambah Tugas ini?')">
                </form>
            </div>

        </div>
    </div>
</div>