@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Management Cuti</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Management Cuti</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Cuti <small>Karyawan</small></h3>
                    </div>
                    <form action="{{route('cuti.search')}}" method="GET" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Cari dgn Type Cuti</label>
                                <div class="col-sm-10">
                                    <input type="text" name="search" class="form-control" id="fname" placeholder="type cuti">
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-sm btn-success">Cari</button>
                                <a href="{{route('cuti')}}" class="btn btn-sm btn-danger">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="{{route('cuti.create')}}">Pengajuan</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">List Cuti</h3>
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
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Type Cuti</th>
                                    <th>Mulai Cuti</th>
                                    <th>Selesai cuti</th>
                                    <th>Selama</th>
                                    <th>Alasan</th>
                                    <th>Penawaran Type Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{$loop -> index+1 }}</td>
                                    <td>{{$cuti->users->nama_lengkap }}</td>
                                    <td>{{$cuti->type_cuti}}</td>
                                    <td>{{$cuti->mulai_cuti}}</td>
                                    <td>{{$cuti->selesai_cuti}}</td>
                                    <td>{{$cuti->selama}}</td>
                                    <td>{{$cuti->alasan}}</td>
                                    <td>
                                        @if(Auth::user()->role=='admin')
                                            {{--{{$cuti->is_approved}}--}}
                                            @if($cuti->penawaran_type_cuti==0)
                                                <form id="{{$cuti->id}}" action="{{route('cuti.paid',$cuti->id)}}" method="POST">
                                                    @csrf
                                                    {{--<button type="button" onclick="approvecuti({{$cuti->id}})" class="btn btn-xs btn-cyan" name="approve" value="1">Approve</button>--}}
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin membayar cuti ini?')" class="btn btn-xs btn-cyan" name="paid" value="1">Paid</button>
                                                </form>
                                                <form id="{{$cuti->id}}" action="{{route('cuti.paid',$cuti->id)}}" method="POST">
                                                    @csrf
                                                    {{--<button type="button" onclick="rejectcuti({{$cuti->id}})" class="btn btn-xs btn-danger" name="approve" value="2">Reject</button>--}}
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin tidak akan membayar cuti ini?')" class="btn btn-xs btn-danger" name="paid" value="2">Unpaid</button>
                                                </form>
                                            @elseif($cuti->penawaran_type_cuti==1)

                                                <form action="{{route('cuti.paid',$cuti->id)}}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin tidak akan membayar cuti ini??')" type="submit" name="paid" value="2">Unpaid</button>
                                                </form>
                                            @else
                                                <form action="{{route('cuti.paid',$cuti->id)}}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-xs btn-cyan" onclick="return confirm('Apakah anda yakin ingin membayar cuti ini??')" type="submit" name="paid" value="1">Paid</button>
                                                </form>
                                            @endif

                                            {{--<a href="{{route('cuti.approve',$cuti->id)}}" class="btn btn-xs btn-cyan">Approve</a>--}}
                                            {{--<a href="{{route('cuti.pending',$cuti->id)}}" class="btn btn-xs btn-warning">Pending</a>--}}
                                            {{--<a href="{{route('cuti.reject',$cuti->id)}}" class="btn btn-xs btn-danger">Reject</a>--}}
                                        @else
                                            @if($cuti->penawaran_type_cuti==0)
                                                <span class="badge badge-pill badge-warning">Pending</span>
                                            @elseif($cuti->penawaran_type_cuti==1)
                                                <span class="badge badge-pill badge-success">Paid</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Unpaid</span>
                                            @endif
                                        @endif
                                    </td>

                                    <td>
                                        @if(Auth::user()->role=='admin')
                                        {{--{{$cuti->is_approved}}--}}
                                        @if($cuti->is_approved==0)
                                            <form id="approve-cuti-{{$cuti->id}}" action="{{route('cuti.approve',$cuti->id)}}" method="POST">
                                                @csrf
                                                {{--<button type="button" onclick="approvecuti({{$cuti->id}})" class="btn btn-xs btn-cyan" name="approve" value="1">Approve</button>--}}
                                                <button type="submit" onclick="return confirm('Apakah anda yakin akan menyetujuinya?')" class="btn btn-xs btn-cyan" name="approve" value="1">Approve</button>
                                            </form>
                                            <form id="reject-cuti-{{$cuti->id}}" action="{{route('cuti.approve',$cuti->id)}}" method="POST">
                                                @csrf
                                                {{--<button type="button" onclick="rejectcuti({{$cuti->id}})" class="btn btn-xs btn-danger" name="approve" value="2">Reject</button>--}}
                                                <button type="submit" onclick="return confirm('Apakah anda yakin akan menolaknya?')" class="btn btn-xs btn-danger" name="approve" value="2">Reject</button>
                                            </form>
                                        @elseif($cuti->is_approved==1)

                                            <form action="{{route('cuti.approve',$cuti->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin akan menolaknya?')" type="submit" name="approve" value="2">Reject</button>
                                            </form>
                                        @else
                                            <form action="{{route('cuti.approve',$cuti->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-xs btn-cyan" onclick="return confirm('Apakah anda yakin akan menyetujuinya?')" type="submit" name="approve" value="1">Approve</button>
                                            </form>
                                        @endif

                                            {{--<a href="{{route('cuti.approve',$cuti->id)}}" class="btn btn-xs btn-cyan">Approve</a>--}}
                                            {{--<a href="{{route('cuti.pending',$cuti->id)}}" class="btn btn-xs btn-warning">Pending</a>--}}
                                            {{--<a href="{{route('cuti.reject',$cuti->id)}}" class="btn btn-xs btn-danger">Reject</a>--}}
                                            @else
                                            @if($cuti->is_approved==0)
                                                <span class="badge badge-pill badge-warning">Pending</span>
                                            @elseif($cuti->is_approved==1)
                                                <span class="badge badge-pill badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Rejected</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Type Cuti</th>
                                    <th>Mulai Cuti</th>
                                    <th>Selesai cuti</th>
                                    <th>Selama</th>
                                    <th>Alasan</th>
                                    <th>Penawaran Type Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $cutis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
    