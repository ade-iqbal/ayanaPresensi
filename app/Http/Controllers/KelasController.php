<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Krs;
use App\Pertemuan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function detail_kelas($id){
        $kelas = Kelas::find($id);
        $mahasiswa = Krs::where('kelas_id', $id)->get();
        $pertemuan = Pertemuan::where('kelas_id', $id)->get();

        return view('admin.kelas.detail_kelas', compact('kelas', 'mahasiswa', 'pertemuan'));
    }

    public function form_tambah(){
        return view('admin.kelas.form_tambah');
    }
    public function getKelas($id){

		$dtkelas = \App\Kelas::all()
		->where('id','=',$id);	

		return view('admin.kelas.editKelas',compact('dtkelas'));

	}
	public function edit(Request $request){

		$id_kelas = $request->id_kelas;
		$kode_kelas = strtoupper($request->kode_matkul)."/kelas/0".$request->kode_kelas;
		$kode_matkul = strtoupper($request->kode_matkul);
		$nama_matkul = $request->nama_matkul;
		$tahun = $request->tahun;
		$semester = $request->semester;
		$sks = $request->sks;

		$conn = mysqli_connect ("localhost","root","","ayanapresensi");

		$hasil2 = mysqli_query ($conn,"select * from kelas where kode_kelas='$kode_kelas' and tahun=$tahun and semester=$semester and id!=$id_kelas");

		if (mysqli_num_rows($hasil2)==0) {
			
			$edit = \App\Kelas::where('id','=',$id_kelas)
			->update([
				'kode_kelas' => $kode_kelas,
				'kode_matkul' => $kode_matkul,
				'nama_matkul' => $nama_matkul,
				'tahun' => $tahun,
				'semester' => $semester,
				'sks' => $sks,
			]);

			$dtkelas = \App\Kelas::all()
			->where('id','=',$id_kelas);

			if ($edit) {
				$pesan = "Kelas Berhasil Diubah";
				return view('admin.kelas.editKelas',compact('pesan','dtkelas'));
			}else{
				$pesann = "Tidak Ada Data yang Diubah";
				return view('admin.kelas.editKelas',compact('pesann','dtkelas'));
			}

		}else{
			$dtkelas = \App\Kelas::all()
			->where('id','=',$id_kelas);

			$pesann = "Kelas tidak Berhasil Ditambahkan, Karena Kelas dengan Kode Kelas, Tahun dan Semester yang Sama Sudah Ada";
			return view('admin.kelas.editKelas',compact('pesann','dtkelas'));
		}

	}
	public function tambah(Request $request)
	{	

		$kode_kelas = strtoupper($request->kode_matkul)."/kelas/0".$request->kode_kelas;
		$kode_matkul = strtoupper($request->kode_matkul);
		$nama_matkul = $request->nama_matkul;
		$tahun = $request->tahun;
		$semester = $request->semester;
		$sks = $request->sks;

		$conn = mysqli_connect ("localhost","root","","ayanapresensi");

		$hasil = mysqli_query ($conn,"select * from kelas where kode_kelas='$kode_kelas' and tahun=$tahun and semester=$semester");

		if (mysqli_num_rows($hasil)==0) {
			$tambah = \App\Kelas::create([
				'kode_kelas' => $kode_kelas,
				'kode_matkul' => $kode_matkul,
				'nama_matkul' => $nama_matkul,
				'tahun' => $tahun,
				'semester' => $semester,
				'sks' => $sks,
			]);	
			if ($tambah) {
				$pesan = "Kelas Berhasil Ditambahkan";
				return view('admin.kelas.form_tambah',compact('pesan'));
			}else{
				$pesann = "Kelas tidak Berhasil Ditambahkan";
				return view('admin.kelas.form_tambah',compact('pesann'));
			}
		}else{
			$pesann = "Kelas tidak Berhasil Ditambahkan, Karena Kelas dengan Kode Kelas, Tahun dan Semester yang Sama Sudah Ada";
			return view('admin.kelas.form_tambah',compact('pesann'));
		}

	}
}
