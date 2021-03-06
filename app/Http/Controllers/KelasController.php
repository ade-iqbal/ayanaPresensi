<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Krs;
use App\Pertemuan;
use App\Mahasiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function detail_kelas($id){
        $kelas = Kelas::find($id);
        $krs_mahasiswa = Krs::where('kelas_id', $id)->get();
        $pertemuan = Pertemuan::where('kelas_id', $id)->get();
		$mahasiswa = Mahasiswa::select('mahasiswa.id', 'mahasiswa.nama')
			->whereNOTIn('mahasiswa.id', function($query) use($id, $kelas){
			$query->select('krs.mahasiswa_id')->from('krs')
											->join('kelas', 'krs.kelas_id', '=', 'kelas.id')
											->where('kelas.kode_matkul', $kelas->kode_matkul);
			})->get();

        return view('admin.kelas.detail_kelas', compact('kelas', 'krs_mahasiswa', 'pertemuan', 'mahasiswa'));
    }

    public function form_tambah(){
        return view('admin.kelas.form_tambah');
    }

    public function tambah_pertemuan($id){
		$pertemuan = Kelas::select('kelas.id', 'pertemuan.pertemuan_ke')
					->join('pertemuan', 'kelas.id', '=', 'pertemuan.kelas_id')
					->where('kelas.id', $id)
					->get();
		$array=[];
		
		for($i=1;$i<=16;$i++){
			$a=false;
			foreach($pertemuan as $pt){
				if($i==$pt->pertemuan_ke){
					$a=true;
					break;
				}
			}
			if($a==false){
				array_push($array, $i);
			}
		}
        return view('admin.pertemuan.tambah_pertemuan', compact('id', 'array'));
    }

    public function store_pertemuan(Request $request, $id){
		$request->validate([
			'pertemuan_ke' => 'required',
			'tanggal' => 'required',
			'materi' => 'required'
		]);

        $request->request->add(['kelas_id' => $id]);
        Pertemuan::create([
			'kelas_id' => $id,
			'pertemuan_ke' => $request->pertemuan_ke,
			'tanggal' => $request->tanggal,
			'materi' => $request->materi,
		]);

        return redirect('/kelas/'.$id.'/detail');
    }

    public function detail_pertemuan($id_kelas, $id_pertemuan){
		$kelas = Kelas::find($id_kelas);
		$pertemuan = Pertemuan::find($id_pertemuan);
        $data_mhs = Kelas::select('mahasiswa.nama', 'kelas.id', 'kelas.nama_matkul', 'absensi.*')
						->join('krs', 'kelas.id', '=', 'krs.kelas_id')
						->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
						->join('pertemuan', 'kelas.id', '=', 'pertemuan.kelas_id')
						->leftjoin('absensi', function($query){
							$query->on('pertemuan.id', '=', 'absensi.pertemuan_id');
							$query->on('krs.id', '=', 'absensi.krs_id');
						})
						->where('kelas.id', $id_kelas)
						->where('pertemuan.id', $id_pertemuan)
						->orderby('pertemuan.pertemuan_ke', 'ASC')
						->get();
								
        return view('admin.pertemuan.lihat_pertemuan', compact('kelas', 'pertemuan', 'data_mhs', 'id_kelas'));
    }



    public function form_edit_kelas($id){

		$dtkelas = \App\Kelas::all()
		->where('id','=',$id);	

		return view('admin.kelas.editKelas',compact('dtkelas'));

	}

	public function update_kelas(Request $request){

		$id_kelas = $request->id_kelas;
		$kode_kelas = strtoupper($request->kode_matkul)."".$request->kode_kelas;
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
				return redirect('/home')->with('pesan', $pesan);
			}else{
				$pesann = "Tidak Ada Data yang Diubah";
				return redirect('/home')->with('pesann', $pesann);
			}

		}else{
			$dtkelas = \App\Kelas::all()
			->where('id','=',$id_kelas);

			$pesann = "Kelas tidak Berhasil Ditambahkan, Karena Kelas dengan Kode Kelas, Tahun dan Semester yang Sama Sudah Ada";
			return redirect('/home')->with('pesann', $pesann);
		}

	}
	public function store_kelas(Request $request)
	{	

		$kode_kelas = strtoupper($request->kode_matkul)."".$request->kode_kelas;
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
				return redirect()->back()->with('pesan', $pesan);
			}else{
				$pesann = "Kelas tidak Berhasil Ditambahkan";
				return redirect()->back()->with('pesann', $pesann);
			}
		}else{
			$pesann = "Kelas tidak Berhasil Ditambahkan, Karena Kelas dengan Kode Kelas, Tahun dan Semester yang Sama Sudah Ada";
			return redirect()->back()->with('pesann', $pesann);
		}

	}
}
