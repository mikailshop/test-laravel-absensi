@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Data Excel</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Excel</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Excel</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">NIK KTP</label>
                        <div class="col-sm-9">
                            <input type="text" name="nik" class="form-control" id="fname" placeholder="Masukkan NIK KTP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_lengkap" class="form-control" id="lname" placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Panggilan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_panggilan" class="form-control" id="fname" placeholder="Masukkan Nama Panggilan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select type="text" name="agama" class="form-control" id="lname" placeholder="Agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select type="text" name="jenis_kelamin" class="form-control" id="lname" placeholder="Jenis Kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tempat Tgl Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_tanggal_lahir" class="form-control" id="lname" placeholder="Masukkan Tempat Tgl Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No Handphone</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_hp" class="form-control" id="lname" placeholder="Masukkan No Handphone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="lname" placeholder="Masukkan Email Id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">File Upload</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input">
                                <label class="custom-file-label">Pilih File...</label>
                                <div class="invalid-feedback">Contoh</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select type="text" name="role" class="form-control" id="lname" placeholder="Role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="lname" placeholder="Masukkan password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat KTP</label>
                        <textarea class="form-control" name="alamat_ktp" rows="3" placeholder="Masukkan Alamat di KTP"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Domisili</label>
                        <textarea class="form-control" name="alamat_domisili" rows="3" placeholder="Masukkan Alamat Domisili"></textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection