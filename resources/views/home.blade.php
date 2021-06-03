@extends('layouts/app')

@section('title', 'Dashboard | Ayana Presensi')

@section('content')

    @if(auth()->user()->role == "mahasiswa")
    <div class="row">
        @forelse($krs_mahasiswa as $krs)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card img text-center border-success mb-3" style="width: 18rem; height:10rem">
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
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
			</symbol>
			<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
			</symbol>
			<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</symbol>
		</svg>
        @if(session('pesan'))
			<div class="alert alert-success d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				<div>{{session('pesan')}}</div>
			</div>
		@endif

		@if(session('pesann'))
			<div class="alert alert-danger d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
				<div>{{session('pesann')}}</div>
			</div>
		@endif


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
                        <td class="text-center">{{$kls->semester%2==0 ? 'Genap' : 'Ganjil'}}</td>
                        <td class="text-center">{{$kls->sks}}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-warning mb-2" href="/kelas/{{$kls->id}}/edit">Edit</a>
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