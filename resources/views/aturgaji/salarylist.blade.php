@extends('layouts.master')

@section('content')

    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Management Gaji</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('aturgaji)}}">Pengaturan Gaji</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-lg btn-dark" href="{{route('aturgaji')}}">Back</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List karyawan beserta list gajinya</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered salarylist">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Type Jabatan</th>
                                            <th>Hari Kerja</th>
                                            <th>Pajak %</th>
                                            <th>Gaji bersih</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$loop->index+1 }}</td>
                                                <td>{{$user->nama_lengkap }}</td>
                                                <td>{{$user->type_jabatan }}</td>
                                                <td>{{$user->hari_kerja}}</td>
                                                <td>{{$user->pajak}}</td>
                                                <td>{{$user->gaji_bersih}}</td>
                                                <td>
                                                        {{--<a href="" class="btn btn-sm btn-primary">Edit</a>--}}
                                                        <a href="{{route('aturgaji.makepayment')}}" class="btn btn-sm btn-danger">Buat Slip gaji</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{--{{ $listgajis->links() }}--}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#zero_config').DataTable( {
                            dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        } );
                    } );
                </script>

            </div>
        </div>
    </div>

@endsection