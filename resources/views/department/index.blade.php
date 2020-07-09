@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Department</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Department</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="{{route('department.create')}}">Tambah</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Department List</h3>
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
                                <th>Nama Department</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$department->nama_department}}</td>
                                <td>
                                    <form id="delete-form-{{ $department->id }}" action="{{route('department.delete',$department->id)}}" method="put">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('department.edit',$department->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="button" onclick="deletePost({{ $department->id }})" class="btn btn-sm btn-danger">Delete</button>
                                        {{--onclick="return confirm('Apakah anda yakin?')"--}}
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        {{ $departments->links() }}
                    </div>
                    
                    {{--sweetalert box for deleting start--}}
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

                    <script type="text/javascript">
                        function deletePost(id)

                        {
                            const swalWithBootstrapButtons = swal.mixin({
                                confirmButtonClass: 'btn btn-success',
                                cancelButtonClass: 'btn btn-danger',
                                buttonsStyling: false,
                            })

                            swalWithBootstrapButtons({
                                title: 'Apakah anda yakin?',
                                text: "Anda tidak akan dapat mengembalikannya!",
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Tidak, batal!',
                                reverseButtons: true,
                            }) .then((result) => {
                                if (result.value) {
                                    event.preventDefault();
                                    document.getElementById('delete-form-'+id).submit();
                                } else if (
                                    // Read more about handling dismissals
                                    result.dismiss === swal.DismissReason.cancel) {
                                    swalWithBootstrapButtons(
                                        'Dibatalkan',
                                        'File anda aman :)',
                                        'error'
                                    )
                                }
                            })
                        }

                    </script>
                    {{--sweetalert box for deleting end--}}

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

                
@endsection