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
                        <textarea class="form-control" name="desc"></textarea>
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

<div class="modal fade" id="editReward">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Reward</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('addReward') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" required id="id" class="form-control">
                    <div class="form-group">
                        <label><b>Nama Reward</b></label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Deskripsi</b></label>
                        <textarea class="form-control" id="desc" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label><b>Point Reward</b></label>
                        <input type="number" name="point" id="point" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><b>Image</b></label>
                        <span id="test"></span>
                        <img src="a.png" id="test" class="img-fluid">
                        <br>
                        <br>
                        <input type="file" name="photo"  class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Tambah" onclick="return confirm('Tambah Tugas ini?')">
                </form>
            </div>

        </div>
    </div>
</div>
