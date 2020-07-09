@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Biodata</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Biodata</li>
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
                        <h3 class="card-title">Biodata <small>Karyawan</small></h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                <form action="{{route('biodata.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <select type="text" name="nama_lengkap" class="form-control" id="fname" placeholder="Masukkan Nama User">
                                @foreach($users as $user)
                                    {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                    <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->nama_lengkap}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Gol Darah</label>
                        <div class="col-sm-10">
                            <input type="text" name="gol_darah" class="form-control" id="lname" placeholder="Masukkan Gol Darah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No SIM A</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_sim_a" class="form-control" id="lname" placeholder="Masukkan No SIM A">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No SIM C</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_sim_c" class="form-control" id="lname" placeholder="Masukkan No SIM C">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No Pasport</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_passport" class="form-control" id="lname" placeholder="Masukkan No Pasport">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_npwp" class="form-control" id="lname" placeholder="Masukkan No NPWP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No BPJS TK</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_bpjs_tk" class="form-control" id="lname" placeholder="Masukkan No BPJS TK">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Status BPJS TK</label>
                        <div class="col-sm-10">
                            <select type="text" name="status_kepesertaan_tk" class="form-control" id="lname" placeholder="Status BPJS TK">
                                <option value="terdaftar">terdaftar</option>
                                <option value="blm_terdaftar">blm_terdaftar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">No BPJS KES </label>
                        <div class="col-sm-10">
                            <input type="text" name="no_bpjs_kes" class="form-control" id="lname" placeholder="Masukkan No BPJS KES ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Status BPJS Kes</label>
                        <div class="col-sm-10">
                            <select type="text" name="status_kepesertaan_kes" class="form-control" id="lname" placeholder="Status BPJS Kes">
                                <option value="terdaftar">terdaftar</option>
                                <option value="blm_terdaftar">blm_terdaftar</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection