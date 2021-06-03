@extends('layouts/app')

@section('title', 'Edit Kelas | Ayana Presensi')

@section('content')
	<div class="container">	

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

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

		<h1>Ubah Kelas</h1>

		@foreach($dtkelas as $kelas)
		<form action="/editKelas" method="post" class="row g-2">
			{{ csrf_field() }}
			<div class="col-md-12">
				<label for="exampleFormControlInput1" class="form-label">Nama Mata Kuliah</label>
				<input type="text" name="nama_matkul" maxlength="100" class="form-control" value="{{$kelas->nama_matkul}}" required>
			</div>
			<div class="col-md-6">
				<label for="exampleFormControlInput1" class="form-label">Kode Mata Kuliah</label>
				<input type="text" name="kode_matkul" maxlength="6" class="form-control" value="{{$kelas->kode_matkul}}" required>
			</div>
			<div class="col-md-6">
				<label for="exampleFormControlInput1" class="form-label">Kode Kelas</label>
				<select name="kode_kelas" class="form-select" aria-label="Default select example">
					<?php  

					$kk = range('A', 'E');
					$kkubah = substr($kelas->kode_kelas, -1);

					foreach ($kk as $kkel) {
						if ($kkel == $kkubah) {
							echo "<option value='$kkel' selected='selected'>$kkel</option>";	
						}else{
							echo "<option value='$kkel'>$kkel</option>";
						}				
					}

					?>

				</select>
			</div>
			<div class="col-md-6">
				<label for="exampleFormControlInput1" class="form-label">Tahun</label>
				<select name="tahun" class="form-select" aria-label="Default select example">
					<?php  

					$skrng = new DateTime("today");
					$skrng = date('Y');
					$skrng += 1;

					$awal = 2010;

					while ($skrng >= $awal) {
						if ($kelas->tahun == $skrng) {
							echo "<option value='$skrng' selected='selected'>$skrng</option>";	
						}else{
							echo "<option value='$skrng'>$skrng</option>";
						}
						$skrng--;
					}

					?>
				</select>
			</div>
			<div class="col-md-6">
				<label for="exampleFormControlInput1" class="form-label">Semester</label>
				<select name="semester" class="form-select" aria-label="Default select example">
					<?php 
					$sem = 1;
					while ($sem <= 2) {
						if ($kelas->semester == $sem) {
							if ($sem % 2 == 1) {
								echo "<option value='$sem' selected='selected'>$sem (Ganjil)</option>";
							}else{
								echo "<option value='$sem' selected='selected'>$sem (Genap)</option>";		
							}	
						}else{
							if ($sem % 2 == 1) {
								echo "<option value='$sem'>$sem (Ganjil)</option>";
							}else{
								echo "<option value='$sem'>$sem (Genap)</option>";		
							}
						}
						$sem++;
					}

					?>
				</select>
			</div>
			<div class="col-md-6">
				<label for="exampleFormControlInput1" class="form-label">SKS</label>
				<input type="number" name="sks" min="1" max="4" class="form-control" value="{{$kelas->sks}}"><br>
			</div>
			<input type="hidden" name="id_kelas" value="{{$kelas->id}}">
			<div class="col-md-12">
				<center>
					<button type="submit" name="ubah" class="btn btn-outline-primary" onclick="return confirm('Apakah Anda yakin data yang ada isi sudah benar?')">Ubah Kelas</button>
				</center>
			</div>
		</form>
		@endforeach
	</div>
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