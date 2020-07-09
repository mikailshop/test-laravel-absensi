@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Absensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Absensi</li>
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
                        <h3 class="card-title">Absen Harian</h3>
                    </div>
                    <form role="form" action="{{route('absenharian')}}" method="post">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-flat btn-info form-control" name="btnIn" >ABSEN MASUK</button>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-flat btn-info form-control" name="btnOut" >ABSEN KELUAR</button>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="note" placeholder="Keterangan....">
                                </div>
                            </div>
                        </div>
                    </form>
                <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-12"><!-- left column -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">History Absen Harian</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>                  
                                <tr>
                                    <th style="width: 10px">Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            
                                <tr>
                                    <td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection