@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Jabatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Jabatan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Jabatan <small>Karyawan</small></h3>
                    </div>
                    <form action="{{route('jabatan.update',$jabatan->id)}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_lengkap" class="form-control" id="lnama" value="{{ $jabatan->user->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" class="form-control" id="fname" value="{{$jabatan->type_jabatan}}">
                                </div>
                            </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection