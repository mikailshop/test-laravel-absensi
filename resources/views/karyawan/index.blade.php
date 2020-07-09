@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Karyawan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Karyawan</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Data Karyawan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>FOTO</th>
                                <th>NIK</th>
                                <th>NAMA LENGKAP</th>
                                <th>NAMA PANGGILAN</th>
                                <th>AGAMA</th>
                                <th>ALAMAT DOMISILI</th>
                                <th>JENIS KELAMIN</th>
                                <th>TEMPAT TANGGAL LAHIR</th>
                                <th>NO HP</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>FOTO</th>
                                <th>NIK</th>
                                <th>NAMA LENGKAP</th>
                                <th>NAMA PANGGILAN</th>
                                <th>AGAMA</th>
                                <th>ALAMAT DOMISILI</th>
                                <th>JENIS KELAMIN</th>
                                <th>TEMPAT TANGGAL LAHIR</th>
                                <th>NO HP</th>
                                <th>AKSI</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@endsection
