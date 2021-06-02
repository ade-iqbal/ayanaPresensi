@extends('layout/template_utama')

@section('title', 'Pertemuan')

@section('title_halaman', 'Pertemuan')

@section('container')
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Cari Kelas" aria-label="Search"
    aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-primary">search</button>
</div>

<h3 class="fs-4 mb-3"><br>List Kelas</h3>
<div class="d-flex flex-column">
    <div class="card">
        <div class="card-header" id="header1">
            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
            <h5><i class="fas fa-chevron-circle-right me-2"></i>Semester Ganjil</h5>
        </div>
    </div>

    <div class="collapse" id="collapse1">
        <div class="card card-body">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Pertemuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-info">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="header1">
            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
            <h5><i class="fas fa-chevron-circle-right me-2"></i>Semester Genap</h5>
        </div>
    </div>

    <div class="collapse" id="collapse2">
        <div class="card card-body">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Pertemuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-info">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection