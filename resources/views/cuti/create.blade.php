@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Cuti</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Cuti</li>
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
                        <h3 class="card-title">Pengajuan Cuti <small>Karyawan</small></h3>
                    </div>
                    <form action="{{route('cuti.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lnama" class="col-sm-1 text-right control-label col-form-label">Type cuti</label>
                            <div class="col-sm-11">
                                <input type="text" name="type_cuti" class="form-control" id="lnama" placeholder="Type Cuti">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pnama" class="col-sm-1 text-right control-label col-form-label">Mulai Cuti</label>
                            <div class="col-sm-3">
                                <input type="date" min="{{date('Y-m-d')}}" name="mulai_cuti" class="form-control" id="CutiMulai">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="selesai_cuti" class="form-control" id="CutiSelesai">
                            </div>
                            <label for="pnama" class="col-sm-2 text-right control-label col-form-label">Selama</label>
                            <div class="col-sm-2">
                                <input type="text" name="selama" class="form-control" id="TotalSelama" placeholder="Selama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lnama" class="col-sm-1 text-right control-label col-form-label">Alasan</label>
                            <div class="col-sm-11">
                                <textarea type="text" name="alasan" class="form-control" placeholder="Alasan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-sm btn-primary">Ajukan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection