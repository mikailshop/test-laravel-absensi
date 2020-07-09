@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Gaji</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Gaji</li>
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
                        <form action="{{route('gaji.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <select type="text" name="nama_lengkap" class="form-control" id="lnama" placeholder="Masukkan nama karyawan">
                                        @foreach($users as $user)
                                            {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                            <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Besaran Gaji</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jumlah_gaji" class="form-control" id="lnama" placeholder="Masukkan besaran gaji">
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