<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mahasiswa;
use App\Pertemuan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function detail_kelas($id){
        
        $kelas = Kelas::find($id);
        $pertemuan_presensi = Kelas::select('mahasiswa.nama', 'kelas.nama_matkul', 'absensi.*', 'pertemuan.*')
						->join('krs', 'kelas.id', '=', 'krs.kelas_id')
						->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
						->join('pertemuan', 'kelas.id', '=', 'pertemuan.kelas_id')
						->leftjoin('absensi', function($query){
							$query->on('pertemuan.id', '=', 'absensi.pertemuan_id');
							$query->on('krs.id', '=', 'absensi.krs_id');
						})
						->where('kelas.id', $id)
						->where('mahasiswa.id', auth()->user()->mahasiswa->id)
						->orderby('pertemuan.pertemuan_ke', 'ASC')
						->get();

        return view('mahasiswa.detail_kelas', compact('kelas', 'pertemuan_presensi'));

    }
}
