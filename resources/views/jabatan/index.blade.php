@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Jabatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Jabatan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="{{route('jabatan.create')}}">Tambah</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">List Jabatan</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Tipe Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($jabatans as $jabatan)
                        <tbody>
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$jabatan->user->nama_lengkap }}</td>
                                <td>{{$jabatan->type_jabatan}}</td>
                                <td>
                                    <form id="delete-form-{{$jabatan->id}}" action="{{route('jabatan.delete',$jabatan->id)}}" method="put">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('jabatan.edit',$jabatan->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {{ $jabatans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
@endsection