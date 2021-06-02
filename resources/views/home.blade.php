@extends('layouts/app')

@section('title', 'Dashboard | Ayana Presensi')

@section('content')

    @if(auth()->user()->role == "mahasiswa")
    <div class="row">
        @forelse($krs_mahasiswa as $krs)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card text-center border-success mb-3" style="width: 18rem; height:10rem">
                <div class="card-body shadow">
                    <h5 class="card-title">{{$krs->nama_matkul}}</h5>
                    <p class="card-text">{{$krs->kode_kelas}}</p>
                    <a href="/mahasiswa/kelas/{{$krs->id}}" class="btn btn-main">Detail</a>
                </div>
            </div>
        </div>

        @empty
            <div class="alert alert-danger text-center fw-bold" role="alert">
                Belum ada kelas yang dipilih
            </div>

        @endforelse
    </div>

    @elseif(auth()->user()->role == "admin")
    <div class="card">
        <div class="card-header text-dark bg-light">
            <h3>Daftar Kelas</h3>
        </div>
        <div class="card-body">
            <table id="example" class="display table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Kode Kelas</th>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Sks</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $kls)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}.</td>
                        <td>{{$kls->kode_kelas}}</td>
                        <td>{{$kls->kode_matkul}}</td>
                        <td>{{$kls->nama_matkul}}</td>
                        <td class="text-center">{{$kls->tahun}}</td>
                        <td class="text-center">{{$kls->semester}}</td>
                        <td class="text-center">{{$kls->sks}}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-warning mb-2" href="">Edit</a>
                            <a class="btn btn-outline-primary" href="/kelas/{{$kls->id}}/detail">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif

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
                "aLengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
                "iDisplayLength": 5,
                searching: false,
                info: false
            });
        } );
    </script>
@endsection