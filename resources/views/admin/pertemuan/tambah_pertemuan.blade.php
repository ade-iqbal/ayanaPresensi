@extends('../../layouts/app')

@section('title', 'Tambah Pertemuan')

@section('title_halaman', 'Tambah Pertemuan')

@section('content')
<div class="d-flex flex-column">
    <h1 class="alert alert-secondary text-center py-2">Form Tambah Pertemuan</h1>
    <form action="/kelas/pertemuan/store/{{$id}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Pertemuan Ke-</label><br>
            <select class="form-control" name="pertemuan_ke">
                <option value="" hidden>-- Masukkan Pilihan --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">UTS</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">UAS</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanggal Pertemuan</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Pilih Tanggal" required="">
          </div>
        </div>
      </div><br>
      <div class="form-group">
        <label>Materi</label>
        <textarea class="form-control" name="materi" required=""></textarea>
      </div><br>
      <button onclick="return confirm('Apakah anda ingin menginput data?');" type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-danger">Hapus</button>
      <a class="btn btn-outline-primary" href="/kelas/{{$id}}/detail">Kembali</a>
    </form>
</div>
@endsection