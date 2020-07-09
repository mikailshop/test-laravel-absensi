extends('layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Pengaturan Gaji</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Pengaturan Gaji</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('aturgaji.detail',$user->id)}}" method="GET" class="form-horizontal no-print">
                        <div class="card-body">
                            <h4 class="card-title">Cari</h4>
                            <div class="form-group">
                                <!-- Date Picker -->
                                <div class="input-group date " id="startDate">
                                    <strong>From</strong>
                                    <input type='date' value="{{request()->startdate}}" name="startdate" class="form-control" />
                                </div>
                                <!-- Time Picker -->
                                <div class="input-group date" id="startTime">
                                    <strong>To</strong>
                                    <input type='date' value="{{request()->enddate}}" name="enddate" class="form-control" />
                                </div>
                                <div class="input-group date" id="search">
                                    <button type="submit" class="btn btn-success">Cari</button>
                                    <a href="{{route('aturgaji.detail',$user->id)}}" class="btn btn-md btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>

        <div class="row no-print">
            <div class="col-12">
                {{--<a href="" id="pdffile" target="-_blank" class="btn btn-default"><i class="fa fa-print"></i>Print </a>--}}
                <button class="btn btn-danger" onclick="pdf()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{route('aturgaji.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <h4 class="card-title aturgaji">Manage salary</h4>
                        <dl class="row userdetails">
                            <dt class="col-sm-5">Nama Karyawan:</dt>
                            <dd class="col-sm-7" name="nama_lengkap" id="nama_lengkap"><strong>{{$nama_lengkap}}</strong></dd>

                            <dt class="col-sm-5">Jabatan Karyawan:</dt>
                            <dd class="col-sm-7" name="jabatan_user" id="jabatan_user">{{$des}}</dd>

                            <dt class="col-sm-5">Gaji Karyawan:</dt>
                            <dd class="col-sm-7" name="gaji_user" id="gaji_user">{{$amt}}</dd>

                            <dt class="col-sm-5">Total Cuti:</dt>
                            <dd class="col-sm-7" name="jumlah_cuti" id="jumlah_cuti">{{$total_cutis}}</dd>

                            <dt class="col-sm-5">Pajak (1%): </dt>
                            <dd class="col-sm-7" name="pajak" id="pajak"></dd>

                            <dt class="col-sm-5">Pembayaran Didepan:</dt>
                            <dd class="col-sm-7" name="advance" id="advance">{{$uangMuka->total}} </dd>

                            <dt class="col-sm-5">Total:</dt>
                            <dd class="col-sm-7" name="total" id="grand-total"> </dd>

                        </dl>

                        {{--<hr>--}}
                            <script>
                                calculate();
                                function calculate(){
                                    var total_gaji=$('#gaji_user').text();
                                    var per_day_jumlah=total_gaji/30;
                                    var hari_cuti=$('#jumlah_cuti').text();
                                    var jumlah_cuti= per_day_jumlah*hari_cuti;
                                    var pajak_percentage=1;
                                    var jumlah_pajak=total_gaji*pajak_percentage/100;
                                    var advance_payment=$('#advance').text();
                                    var grand_total=total_gaji-jumlah_cuti-jumlah_pajak-advance_payment;
                                    $('#pajak').text(jumlah_pajak);
                                    $('#grand-total').text(grand_total);
                                    // console.log(grand_total);
                                }
                            </script>
                        <hr>

                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Working days</h4>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="lname" class="col-sm-3 text-right control-label col-form-label">Total hari kerja</label>--}}
                                {{--<div class="col-sm-5">--}}
                                    {{--<input type="text" name="hari_kerja" id="days" value="30" class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="fname" class="col-sm-3 text-right control-label col-form-label">Rata" perhari</label>--}}
                                {{--<div class="col-sm-5">--}}
                                    {{--<input type="number" name="rate_per_day" id="rates" class="form-control" placeholder="Rata-rata perhari>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="fname" class="col-sm-3 text-right control-label col-form-label">Terima bersih</label>--}}
                                {{--<div class="col-sm-5">--}}
                                    {{--<input type="number" name="terima_bersih" id="gaji" class="form-control" placeholder="Terima bersih">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<hr><hr>--}}

                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Deduksi</h4>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="lname" class="col-sm-3 text-right control-label col-form-label">pajak %</label>--}}
                                {{--<div class="col-sm-5">--}}
                                    {{--<input type="text" name="pajak_deduction"   class="form-control" value="" placeholder="Deduksi pajak">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<hr><hr>--}}



                        {{--<div class="border-top no-print">--}}
                            {{--<div class="card-body">--}}
                                {{--<button type="submit" class="btn btn-dark">Ajukan</button>--}}
                                {{--<a href="{{route('aturgaji')}}" class="btn btn-md btn-danger">Kembali</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <form action="{{route('aturgaji.makeadvance')}}" method="post" class="form-horizontal advance-pay">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="card-body">
                        <h4 class="card-title">Pembayaran Dimuka</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                            <div class="col-sm-5">
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Jumlah</label>
                            <div class="col-sm-5">
                                <input type="text" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" />
                            </div>
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-warning">Tambah</button>
                            {{--<a href="#" class="btn btn-md btn-danger">Kembali</a>--}}
                        </div>
                    </div>
                    <hr><hr>
                </form>
                <div class="card-body">
                    <h5 class="card-title">List Pembayaran dimuka</h5><hr/>
                    <table id="advance-payment" class="display advancepayment" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah(RS)</th>
                            <th class="no-print">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advance as $advances)
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$advances ->date }}</td>
                                <td>{{$advances ->jumlah }}</td>
                                <td class="no-print">Edit</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $('#rates').keyup(function(){
        var hari_kerja = $('#days').val();
        var rate_per_day = $(this).val();
        var total_gaji_pokok = hari_kerja * rate_per_day;
        $('#salary').val(total_gaji_pokok);
        })


        $('#pajak').keyup(function(){
            var pajak = $(this).val();
            var gaji = $('#gaji').val();
            var jumlah_pajak = gaji * pajak/100;
            var total_netpay = gaji - jumlah_pajak;
            $('#net_pay').val(total_netpay);
        })
    </script>

    {{--datatable--}}
    <script>
        $(document).ready(function() {
            $('#advance-payment').DataTable();
        });
    </script>

    {{--Start-For printing the screen--}}
    <script>
        function pdf() {
            window.print();
        }
    </script>

    {{--End-For printing the screen--}}
</section>
@endsection