@extends('../../layouts/app')

@section('title', 'Lihat Pertemuan')

@section('title_halaman', 'Lihat Pertemuan')

@section('content')
<h3 class="fs-4 mb-3"><br>Detail Pertemuan</h3>
<div class="d-flex flex-column">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Mahasiswa</th>
      <th scope="col">Status</th>
      <th scope="col">Jam Masuk</th>
      <th scope="col">Jam Keluar</th>
      <th scope="col">Durasi</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data_mhs as $mhs)
    <tr>
      <th scope="row">1</th>
      <td>{{$mhs->nama}}</td>
      <td>{{$mhs->durasi==0?'Tidak Hadir':'Hadir'}}</td>
      <td>{{$mhs->jam_masuk}}</td>
      <td>{{$mhs->jam_keluar}}</td>
      <td>{{$mhs->durasi}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</table>
</div>

@endsection