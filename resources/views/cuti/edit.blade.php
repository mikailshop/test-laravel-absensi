@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Pengajuan Cuti</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Pengajuan Cuti</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <form action="{{url('/cuti/update',$leave->id)}}" method="post" class="form-horizontal">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Update Cuti</h4>
                <div class="form-group row">
                    <label for="lnama" class="col-sm-3 text-right control-label col-form-label">Type Cuti</label>
                    <div class="col-sm-9">
                        <input type="text" name="type_cuti" class="form-control" id="lnama" placeholder="Type cuti">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pnama" class="col-sm-3 text-right control-label col-form-label">Mulai Cuti</label>
                    <div class="col-sm-4">
                        <input type="date" name="mulai_cuti" class="form-control" id="pnama">
                    </div>
                    <div class="col-sm-4">
                        <input type="date" name="selesai_cuti" class="form-control" id="pnama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lnama" class="col-sm-3 text-right control-label col-form-label">Selama</label>
                    <div class="col-sm-9">
                        <input type="text" name="selama" class="form-control" id="lnama" placeholder="Selama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lnama" class="col-sm-3 text-right control-label col-form-label">Alasan</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="alasan" class="form-control" id="lnama" placeholder="Alasan">
                        </textarea></div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-sm btn-primary">Ajukan</button>
                </div>
            </div>
        </form>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection