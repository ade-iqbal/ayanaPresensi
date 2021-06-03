@extends('layouts/app')

@section('title', 'Kelas | Ayana Presensi')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

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
        </div>
        <div class="row">
            <div class="col-4">
                <p>Tahun <span style="margin-left: 65px;">: {{$kelas->tahun}}</span></p>
            </div>
            <div class="col-4">
                <p>Sks <span style="margin-left: 82px;">: {{$kelas->sks}}</span></p>
            </div>
        </div>
        <a class="btn btn-outline-primary" href="/home">Kembali</a>
    </div>
    <div class="card-body">
        <form action="/kelas/peserta/{{$kelas->id}}/store" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-4">
                    <select class="selectpicker form-control" name="mahasiswa_id" data-live-search="true" required>
                        <option value="" hidden> Tidak ada mahasiswa yang dipilih </option>
                        @foreach($mahasiswa as $mhswa)
                        <option value="{{$mhswa->id}}">{{$mhswa->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Tambah Peserta</button>
                </div>
            </div>
        </form>

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
                @foreach($krs_mahasiswa as $mhs)
                <tr>
                    <td class="text-center">{{$loop->iteration}}.</td>
                    <td>{{$mhs->mahasiswa->nama}}</td>
                    <td>{{$mhs->mahasiswa->nim}}</td>
                    <td>{{$mhs->mahasiswa->email}}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger" href="/kelas/peserta/{{$mhs->id}}/destroy">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body mt-3">
        <a class="btn btn-success mb-3 float-right" href="/kelas/pertemuan/tambah/{{$kelas->id}}">Tambah Pertemuan</a>
        <table id="example-2" class="display table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Pertemuan Ke</th>
                    <th>Tanggal</th>
                    <th>Materi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pertemuan as $ptr)
                <tr>
                    <td class="text-center">
                        @if($ptr->pertemuan_ke==8) UTS
                        @elseif($ptr->pertemuan_ke==16) UAS
                        @else {{$ptr->pertemuan_ke}}
                        @endif
                    </td>
                    <td>{{date("d-m-Y", strtotime($ptr->tanggal))}}</td>
                    <td>{{$ptr->materi}}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-primary" href="/kelas/pertemuan/{{$kelas->id}}/{{$ptr->id}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "bJQueryUI": true,
            "bDestroy": true,
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0, 1]
            }],
            "aLengthMenu": [
                [5, 10, 15],
                [5, 10, 15]
            ],
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
            "aLengthMenu": [
                [5, 10, 15],
                [5, 10, 15]
            ],
            "iDisplayLength": 5,
            searching: false,
            info: false
        });
    });
</script>
@endsection