<div class="card-body table-responsive p-0">
    <table class="table table-bordered table-striped table-valign-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>NAMA LENGKAP</th>
                <th>NO HP</th>
                <th>DEPARTMENT</th>
                <th>JABATAN</th>
                <th>GAJI</th>
                <th>JUMLAH CUTI</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{ $user -> nama_lengkap }}</td>
                <td>{{ $user -> no_hp }}</td>
                <td>{{ request()->is('department') ? 'nama_department':'tidak_ada' }}</td>
                <td>{{ request()->is('jabatan') ? 'type_jabatan':'tidak_ada' }}</td>
                <td>{{ $user -> gaji }}</td>
                <td>{{ $user -> approve_jumlah_cuti }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>