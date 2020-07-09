@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajement Cuti</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajement Cuti</li>
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
                        <h3 class="card-title">Data Cuti <small>Karyawan</small></h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="#" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="lnama" class="col-sm-2 text-right control-label col-form-label">Cari Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="type_cuti" class="form-control" id="lnama" placeholder="Cari nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Mulai cuti</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="mulai_cuti" class="form-control" id="pnama">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="selesai_cuti" class="form-control" id="pnama">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
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