@extends('layouts/app')

@section('title', 'Kelas-Ayana Presensi')

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
                    <p>Semester <span style="margin-left: 40px;">: {{$kelas->semester}}
                        @if($kelas->semester%2 != 0) 
                            (Ganjil)
                        @else 
                            (Genap)
                        @endif
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
            <a class="btn btn-success mb-3 float-right" href="">Tambah Peserta</a>
            <table id="example" class="display table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}.</td>
                        <td>{{$mhs->mahasiswa->nama}}</td>
                        <td>{{$mhs->mahasiswa->nim}}</td>
                        <td>{{$mhs->mahasiswa->email}}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger" href="">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body mt-3">
            <a class="btn btn-success mb-3 float-right" href="">Tambah Pertemuan</a>
            <table id="example-2" class="display table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Pertemuan Ke</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pertemuan as $ptr)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}.</td>
                        <td>{{date("d-m-Y", strtotime($ptr->tanggal))}}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-primary" href="">Detail</a>
                        </td>
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