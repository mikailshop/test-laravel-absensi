@extends('layouts.master')

@section('content')
<style>
        @media print  {
            .page-breadcrumb{
                display: none;
            }
            .sidebar-nav{
                display: none;
            }
            .no-print {
                display: none;
            }
            .text-center{
                display: none;
            }
            #advance-pay{
                display: none;
            }
        }
    </style>

    <div id="main-wrapper">

        <div id="main-wrapper">

            <div class="page-wrapper">

                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Slip Gaji</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                                <h3> &nbsp;<b class="text-danger">Slip Gaji</b></h3>
                                <p class="text-muted m-l-5">
                                    <br/> Nama Karyawan:
                        </div>


                        <div class="col-md-6">
                            <br><br>
                                <p class="text-muted m-l-5">
                                    <br/> Jabatan:</p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                                <h4 class="card-title">Pendapatan</h4>

                                <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="basic_gaji" id="basic_gaji" class="form-control" value="" >
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="pull-right m-t-30 text-right">
                            <p>Jumlah Total: $13,848</p>
                            <p>Pajak (10%) : $138 </p>
                            <hr>
                            <h3><b>Total :</b> $13,986</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        {{--<div class="text-right">--}}
                            {{--<button class="btn btn-danger" type="submit"> Print </button>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="row no-print">
                    <div class="col-12">
                        {{--<a href="" id="pdffile" target="-_blank" class="btn btn-default"><i class="fa fa-print"></i>Print </a>--}}
                        <button class="btn btn-default" onclick="pdf()">Print</button>
                    </div>
                </div>

                <script>
                    function pdf() {
                        window.print();
                    }
                </script>
            </div>
        </div>
    </div>

@endsection