@extends('../../layouts/app')

@section('title', 'Lihat Pertemuan')

@section('title_halaman', 'Lihat Pertemuan')

@section('content')
<h3 class="fs-4 mb-3"><br>Detail Pertemuan</h3>
<div class="d-flex flex-column">

<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">#</th>
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
      <td class="text-center">{{$loop->iteration}}.</td>
      <td>{{$mhs->nama}}</td>
      <td>{{$mhs->durasi==0?'Tidak Hadir':'Hadir'}}</td>
      <td>{{$mhs->jam_masuk}}</td>
      <td>{{$mhs->jam_keluar}}</td>
      <td>{{floor($mhs->durasi/60)}} jam {{$mhs->durasi%60}} menit</td>
    </tr>
    @endforeach
  </tbody>
</table>

</table>
</div>

@endsection