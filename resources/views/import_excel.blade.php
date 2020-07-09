@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Import Excel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Import Excel</li>
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
                        <h3 class="card-title">Import Excel</h3>
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            upload validation error
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close"data-dismiss="alert">x</button><strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                    <form role="form" action="{{ url('/import_excel/import') }}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <table>
                                <tr>
                                    <td width="40%"><label>Select File For Upload</label></td>
                                    <td width="30%">
                                        <input type="file" name="select_file" />
                                    </td>
                                    <td width="30%">
                                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-12"><!-- left column -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>NAMA PANGGILAN</th>
                                    <th>AGAMA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>TTL</th>
                                    <th>NO HP</th>
                                    <th>EMAIL</th>
                                    <th>ALAMAT KTP</th>
                                    <th>DOMISILI</th>
                                    <th>JUMLAH CUTI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $loop -> index+1 }}</td>
                                    <td>{{ $row -> nik }}</td>
                                    <td>{{ $row -> nama_lengkap }}</td>
                                    <td>{{ $row -> nama_panggilan }}</td>
                                    <td>{{ $row -> agama }}</td>
                                    <td>{{ $row -> jenis_kelamin }}</td>
                                    <td>{{ $row -> tempat_tanggal_lahir }}</td>
                                    <td>{{ $row -> no_hp }}</td>
                                    <td>{{ $row -> email }}</td>
                                    <td>{{ $row -> alamat_ktp }}</td>
                                    <td>{{ $row -> alamat_domisili }}</td>
                                    <td>{{ $row -> jumlah_cuti }}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection