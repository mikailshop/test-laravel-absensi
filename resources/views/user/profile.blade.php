@extends('layouts.master')

@section('content')
            
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img height="80" width="80" class="profile-user-img img-fluid img-circle" src="{{asset('images/'.$user->avatar)}}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->nama_lengkap }}</h3>
                                    
                                    <p class="text-muted text-center">Jabatan</p>
                                    
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>No Telephone</b> <a class="float-right">{{$user->no_hp}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                        </li>
                                    </ul>

                                    <a href="" class="btn btn-primary btn-block"><b></b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Profil Lengkap</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                    <p class="text-muted">
                                        <span class="tag tag-danger">UI Design</span>
                                        <span class="tag tag-success">Coding</span>
                                        <span class="tag tag-info">Javascript</span>
                                        <span class="tag tag-warning">PHP</span>
                                        <span class="tag tag-primary">Node.js</span>
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Catatan</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#pasangan" data-toggle="tab">Pasangan</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#anak" data-toggle="tab">Anak</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#orangtua" data-toggle="tab">Orangtua</a></li>
                                    </ul>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="biodata">
                                            <table class="table table-bordered table-striped table-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <th>No SIM A</th>
                                                        <th>No SIM C</th>
                                                        <th>No Pasport</th>
                                                        <th>No NPWP</th>
                                                        <th>Gol Darah</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($biodatas as $biodata)
                                                    <tr>
                                                        <td>{{ $biodata->no_sim_a }}</td>
                                                        <td>{{ $biodata->no_sim_c }}</td>
                                                        <td>{{ $biodata->no_passport }}</td>
                                                        <td>{{ $biodata->no_npwp }}</td>
                                                        <td>{{ $biodata->gol_darah }}</td>
                                                        <td><button type="button"
                                                                    no_sim_a="{{$biodata->no_sim_a}}"
                                                                    no_sim_c="{{$biodata->no_sim_c}}"
                                                                    no_passport="{{$biodata->no_passport}}"
                                                                    no_npwp="{{$biodata->no_npwp}}"
                                                                    gol_darah="{{$biodata->gol_darah}}"
                                                                    class="view-data btn btn-xs btn-success">View</button>
                                                            <a href="{{url('/biodata/edit',$biodata->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                                            <form id="delete-form-{{ $biodata->id }}" action="{{url('/biodata/delete',$biodata->id)}}" method="put">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered table-striped table-valign-middle">
                                            <thead>
                                                    <tr>
                                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable jsgrid-header-sort jsgrid-header-sort-asc" style="width: 100px;"><font style="vertical-align: inherit;">No BPJS TK</font></th>
                                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable jsgrid-header-sort jsgrid-header-sort-asc" style="width: 100px;"><font style="vertical-align: inherit;">Status TK</font></th>
                                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable jsgrid-header-sort jsgrid-header-sort-asc" style="width: 100px;"><font style="vertical-align: inherit;">No BPJS KES</font></th>
                                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable jsgrid-header-sort jsgrid-header-sort-asc" style="width: 100px;"><font style="vertical-align: inherit;">Status KES</font></th>
                                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable jsgrid-header-sort jsgrid-header-sort-asc" style="width: 100px;"><font style="vertical-align: inherit;">Aksi</font></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($biodatas as $biodata)
                                                    <tr>
                                                        <td>{{ $biodata->no_bpjs_tk }}</td>
                                                        <td>{{ $biodata->status_tk }}</td>
                                                        <td>{{ $biodata->no_bpjs_kes }}</td>
                                                        <td>{{ $biodata->status_kes }}</td>
                                                        <td><button type="button"
                                                                    no_bpjs_tk="{{$biodata->no_bpjs_tk}}"
                                                                    status_tk="{{$biodata->status_tk}}"
                                                                    no_bpjs_kes="{{$biodata->no_bpjs_kes}}"
                                                                    status_kes="{{$biodata->status_kes}}"
                                                                    class="view-data btn btn-xs btn-success">View</button>
                                                            <a href="{{url('/biodata/edit',$biodata->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                                            <form id="delete-form-{{ $biodata->id }}" action="{{url('/biodata/delete',$biodata->id)}}" method="put">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="btn-group col-md-3">
                                                <a class="btn btn-sm btn-primary" href="{{route('biodata.create')}}">Tambah</a>
                                                <br>
                                                <a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-sm">
                                                    Import Xls
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="pasangan">
                                            <table class="table table-bordered table-striped table-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Status Pernikahan</th>
                                                        <th>NIK Pasangan</th>
                                                        <th>Nama Pasangan</th>
                                                        <th>Pekerjaan</th>
                                                        <th>No Handphone</th>
                                                        <th>No Whatsapp</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($pasangans as $pasangan)
                                                    <tr>
                                                        <td>{{ $pasangan->status_pernikahan }}</td>
                                                        <td>{{ $pasangan->nik_pasangan }}</td>
                                                        <td>{{ $pasangan->nama_pasangan }}</td>
                                                        <td>{{ $pasangan->pekerjaan }}</td>
                                                        <td>{{ $pasangan->no_handphone }}</td>
                                                        <td>{{ $pasangan->no_whatsapp }}</td>
                                                        <td><button type="button"
                                                                    nik_pasangan="{{$anak->nik_pasangan}}"
                                                                    nama_pasangan="{{$pasangan->nama_pasangan}}"
                                                                    pekerjaan="{{$pasangan->pekerjaan}}"
                                                                    no_handphone="{{$pasangan->no_handphone}}"
                                                                    no_whatsapp="{{$pasangan->no_whatsapp}}"
                                                                    class="view-data btn btn-xs btn-success">View</button>
                                                            <a href="{{url('/pasangan/edit',$pasangan->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                                            <form id="delete-form-{{ $pasangan->id }}" action="{{url('/pasangan/delete',$pasangan->id)}}" method="put">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <div class="btn-group col-md-3">
                                                <a class="btn btn-sm btn-primary" href="{{route('pasangan.create')}}">Tambah</a>
                                                <br>
                                                <a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-sm">
                                                    Import Xls
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="anak">
                                            <table class="table table-bordered table-striped table-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <th>NIK Anak</th>
                                                        <th>Nama Anak</th>
                                                        <th>Tempat Tgl Lahir</th>
                                                        <th>Pendidikan</th>
                                                        <th>Hubungan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($anaks as $anak)
                                                    <tr>
                                                        <td>{{ $anak->nik_anak }}</td>
                                                        <td>{{ $anak->nama_anak }}</td>
                                                        <td>{{ $anak->tempat_tanggal_lahir }}</td>
                                                        <td>{{ $anak->pendidikan }}</td>
                                                        <td>{{ $anak->hubungan }}</td>
                                                        <td><button type="button"
                                                                    nik_anak="{{$anak->nik_anak}}"
                                                                    nama_anak="{{$anak->nama_anak}}"
                                                                    tempat_tanggal_lahir="{{$anak->tempat_tanggal_lahir}}"
                                                                    pendidikan="{{$anak->pendidikan}}"
                                                                    hubungan="{{$anak->hubungan}}"
                                                                    class="view-data btn btn-xs btn-success">View</button>
                                                            <a href="{{url('/anak/edit',$anak->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                                            <form id="delete-form-{{ $anak->id }}" action="{{url('/anak/delete',$anak->id)}}" method="put">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="btn-group col-md-3">
                                                <a class="btn btn-sm btn-primary" href="{{route('anak.create')}}">Tambah</a>
                                                <br>
                                                <a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-sm">
                                                    Import Xls
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="orangtua">
                                            <table class="table table-bordered table-striped table-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <th>NIK Orangtua</th>
                                                        <th>Nama Orangtua</th>
                                                        <th>Pekerjaan</th>
                                                        <th>No Handphone</th>
                                                        <th>Hubungan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orangtuas as $orangtua)
                                                    <tr>
                                                        <td>{{ $orangtua->nik_orangtua}}</td>
                                                        <td>{{ $orangtua->nama_lengkap }}</td>
                                                        <td>{{ $orangtua->pekerjaan }}</td>
                                                        <td>{{ $orangtua->no_hp }}</td>
                                                        <td>{{ $orangtua->hubungan }}</td>
                                                        <td><button type="button"
                                                                    nik_orangtua="{{$orangtua->nik_orangtua}}"
                                                                    nama_orangtua="{{$orangtua->nama_orangtua}}"
                                                                    pekerjaan="{{$orangtua->pekerjaan}}"
                                                                    no_hp="{{$pasangan->no_hp}}"
                                                                    hubungan="{{$orangtua->hubungan}}"
                                                                    class="view-data btn btn-xs btn-success">View</button>
                                                            <a href="{{url('/orangtua/edit',$orangtua->id)}}" class="btn btn-xs btn-dark">Edit</a>
                                                            <form id="delete-form-{{ $orangtua->id }}" action="{{url('/orangtua/delete',$orangtua->id)}}" method="put">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <div class="btn-group col-md-3">
                                                <a class="btn btn-sm btn-primary" href="{{route('orangtua.create')}}">Tambah</a>
                                                <br>
                                                <a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-sm">
                                                    Import Xls
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection