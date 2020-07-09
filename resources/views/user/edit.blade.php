@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Edit</li>
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
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{route('user.update', $user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">NIK KTP</label>
                        <div class="col-sm-9">
                            <input type="text" name="nik" class="form-control" id="fname" placeholder="Masukkan NIK KTP" value="{{$user->nik}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_lengkap" class="form-control" id="lname" placeholder="Masukkan Nama Lengkap" value="{{$user->nama_lengkap}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Panggilan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_panggilan" class="form-control" id="lname" placeholder="Masukkan Nama Panggilan" value="{{$user->nama_panggilan}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select type="text" name="agama" class="form-control" id="lname" placeholder="Agama">
                                <option value="islam" @if($user->agama == 'islam') selected @endif>Islam</option>
                                <option value="kristen" @if($user->agama == 'kristen') selected @endif>kristen</option>
                                <option value="katolik" @if($user->agama == 'katolik') selected @endif>katolik</option>
                                <option value="hindu" @if($user->agama == 'hindu') selected @endif>hindu</option>
                                <option value="budha" @if($user->agama == 'budha') selected @endif>budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select type="text" name="jenis_kelamin" class="form-control" id="lname" placeholder="Jenis Kelamin">
                                <option value="Laki-laki" @if($user->jenis_kelamin == 'Laki-laki') selected @endif>laki-laki</option>
                                <option value="Perempuan" @if($user->jenis_kelamin == 'Perempuan') selected @endif>perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tempat Tgl Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_tanggal_lahir" class="form-control" id="lname" placeholder="Masukkan Tempat Tgl Lahir" value="{{$user->tempat_tanggal_lahir}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No Handphone</label>
                        <div class="col-sm-9">
                            <input type="text" name="no_hp" class="form-control" id="lname" placeholder="Masukkan No Handphone" value="{{$user->no_hp}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="lname" placeholder="Masukkan Email Id" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat KTP</label>
                        <textarea class="form-control" name="alamat_ktp" rows="3" placeholder="Masukkan Alamat di KTP">{{$user->alamat_ktp}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Domisili</label>
                        <textarea class="form-control" name="alamat_domisili" rows="3" placeholder="Masukkan Alamat Domisili">{{$user->alamat_domisili}}</textarea>
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
@endsection