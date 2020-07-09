@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Pengaturan Gaji</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Pengaturan Gaji</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <form action="{{route('aturgaji.detail')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Pengaturan Detail Gaji</h4>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <select type="text" name="user_id" class="form-control">
                                        <option value="0" disabled {{ old('user') ? '' : 'selected' }}>Semua</option>
                                        @foreach($users as $user)
                                        {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                        <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-sm btn-primary">Go</button>
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
<!-- /.content -->>
@endsection