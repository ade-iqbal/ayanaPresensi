@extends('layouts/app')

@section('title', 'Dashboard-Ayana Presensi')

@section('content')

    @if(auth()->user()->role == "mahasiswa")
    <div class="row">
        @forelse($krs_mahasiswa as $krs)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card text-center mb-3" style="width: 18rem; height:10rem">
                <div class="card-body">
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
    @endif

@endsection