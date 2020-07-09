@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Jabatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Jabatan</li>
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
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('jabatan.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama Karyawan</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="nama_lengkap" class="form-control" id="fname" placeholder="Masukkan Nama Karyawan">
                                            @foreach($users as $user)
                                                {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                                <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="jabatan" class="form-control" id="fname" placeholder="Masukkan type jabatan">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection