@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1>Edit Data Gaji</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Edit Data Gaji</li>
        </ol>
    </div>
    </div>
</div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Gaji <small>Karyawan</small></h3>
                    </div>
                    <form action="{{route('gaji.update',$gaji->id)}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap" class="form-control" id="lnama" value="{{ $gaji->user->nama_lengkap }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Besaran Gaji</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah_gaji" class="form-control" id="lnama" value="{{ $gaji->jumlah_gaji }}">
                            </div>
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
</div>
<!-- /.card -->

</section>
<!-- /.content -->
@endsection