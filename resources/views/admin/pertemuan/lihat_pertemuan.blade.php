@extends('../../layouts/app')

@section('title', 'Lihat Pertemuan | Ayana Presensi')

@section('content')

  <div class="card">
        <div class="card-header text-dark bg-light">
            <h3>{{$kelas->nama_matkul}}</h3>
            <p>{{$kelas->kode_matkul}}</p>
            <div class="row">
                <div class="col-4">
                    <p>Kode Kelas <span style="margin-left: 30px;">: {{$kelas->kode_kelas}}</span></p>
                </div>
                <div class="col-4">
                    <p>Semester <span style="margin-left: 40px;">: {{$kelas->semester%2==0 ? '(Genap)' : '(Ganjil)'}}
                    </span></p>
                </div>
                <div class="col-4">
                  <p>Pertemuan Ke <span style="margin-left: 40px;">: {{$pertemuan->pertemuan_ke}}</span></p>
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
            <a class="btn btn-outline-primary" href="/kelas/{{$id_kelas}}/detail">Kembali</a>
        </div>
        <div class="card-body mt-3">
            <form action="/upload/{{$pertemuan->id}}/{{$id_kelas}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="upload-file">Upload CSV</label>
                    <input type="file" name="upload-file" class="form-control mb-3">
                </div>
                <input class="btn btn-success mb-3" type="submit" value="Upload CSV" name="submit"> 
            </form>
            <!-- <a class="btn btn-success mb-3 float-right" href="/upload/{{$pertemuan->id}}/{{$id_kelas}}">Upload CVS</a> -->
            <table id="example-2" class="display table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama Mahasiswa</th>
                        <th>Status</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Durasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_mhs as $mhs)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}.</td>
                        <td>{{$mhs->nama}}</td>
                        <td>{{$mhs->durasi==0?'Tidak Hadir':'Hadir'}}</td>
                        <td>{{$mhs->jam_masuk==NULL ? '-' : $mhs->jam_masuk}}</td>
                        <td>{{$mhs->jam_keluar==NULL ? '-' : $mhs->jam_keluar}}</td>
                        <td>{{floor($mhs->durasi/60)}} jam {{$mhs->durasi%60}} menit</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
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
            $('#example-2').DataTable({
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