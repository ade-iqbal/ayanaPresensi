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
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
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
      <a href="/kelas/{{$id}}/detail">Kembali</a>
    </form>
</div>
@endsection