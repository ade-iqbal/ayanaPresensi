@extends('../layouts/app')

@section('title', 'Kelas-Ayana Presensi')

@section('content')

    <div class="card">
        <div class="card-header text-dark bg-light">
            <h4 class="fw-bold">{{$kelas->nama_matkul}}</h4>
            <p>{{$kelas->kode_matkul}}</p>
            <div class="row">
                <div class="col-4">
                    <p>Kode Kelas <span style="margin-left: 30px;">: {{$kelas->kode_kelas}}</span></p>
                </div>
                <div class="col-4">
                    <p>Semester <span style="margin-left: 40px;">: {{$kelas->semester}}
                        (
                            @if($kelas->semester%2!=0) Ganjil
                            @else Genap
                            @endif
                        )
                    </span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>Tahun <span style="margin-left: 65px;">: {{$kelas->tahun}}</span></p>
                </div>
                <div class="col-4">
                    <p>Sks <span style="margin-left: 82px;">: {{$kelas->sks}}</span></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="display table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Pertemuan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>123</td>
                        <td>123</td>
                        <td>hadir</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "bJQueryUI": true,
                "bDestroy": true,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0, 1]
                }],
                "aLengthMenu": [[5, 10, 15], [5, 10, 15]],
                "iDisplayLength": 5,
                searching: false, 
                info: false
            });
        } );
    </script>
@endsection