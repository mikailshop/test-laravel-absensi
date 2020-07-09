@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="btn-group col-md-2">
                    <a class="btn btn-sm btn-primary" href="{{route('user.create')}}">Tambah</a>
                    <br>
                    <a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-sm">
                        Import Xls
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">User List</h3>
                            <div class="card-tools">
                                <a href="{{route('user.exportpdf')}}" class="btn btn-tool btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <a href="{{route('user.exportxls')}}" class="btn btn-tool btn-sm">
                                    <i class="fas fa-file-excel"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>FOTO</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>NO HP</th>
                                        <th>JUMLAH CUTI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td><img src="@if(!$user->avatar)
                                                        {{ asset('images/default.jpg') }}
                                                        @else($user->avatar)
                                                        {{ asset('images/' .$user->avatar) }}
                                                        @endif" width="80px" height="80px">{{ $user -> avatar }}</td>
                                        <td><a href="user/{{$user->id}}/profile">{{ $user -> nama_lengkap }}</td>
                                        <td>{{ $user -> no_hp }}</td>
                                        <td>{{ $user -> approve_jumlah_cuti }}</td>
                                        <td>
                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                            <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>FOTO</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>NO HP</th>
                                        <th>JUMLAH CUTI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                <div id="show-data" class="modal fade" id="view-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="nik"></p>
                                <p id="nama_lengkap"></p>
                                <p id="nama_panggilan"></p>
                                <p id="agama"></p>
                                <p id="jenis_kelamin"></p>
                                <p id="tempat_tanggal_lahir"></p>
                                <p id="no_hp"></p>
                                <p id="email"></p>
                                <p id="jumlah_cuti"></p>
                                <p id="alamat_ktp"></p>
                                <p id="alamat_domisili"></p>
                                <p id="gaji"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="{{route('user.importxls')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                        <input type="file" name="import_file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" value="Import" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>