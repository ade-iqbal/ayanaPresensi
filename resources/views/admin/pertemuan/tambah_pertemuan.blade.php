@extends('../../layouts/app')

@section('title', 'Tambah Pertemuan | Ayana Presensi')

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
            <select class="form-control @error('pertemuan_ke') is-invalid @enderror" name="pertemuan_ke">
                <option value="" hidden>-- Masukkan Pilihan --</option>
                @foreach($array as $ar)
                  <option value="{{$ar}}" @if($ar == old('pertemuan_ke')) selected @endif>{{($ar==8) ? "UTS" : (($ar==16) ? "UAS" : $ar)}}</option>
                @endforeach
            </select>
            @error('pertemuan_ke')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanggal Pertemuan</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Pilih Tanggal" value="{{old('tanggal')}}">
            @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
      </div><br>
      <div class="form-group">
        <label>Materi</label>
        <textarea class="form-control @error('materi') is-invalid @enderror" name="materi">{{old('materi')}}</textarea>
        @error('materi')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div><br>
      <button onclick="return confirm('Apakah anda ingin menginput data?');" type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-danger">Hapus</button>
      <a class="btn btn-outline-primary" href="/kelas/{{$id}}/detail">Kembali</a>
    </form>
</div>
@endsection