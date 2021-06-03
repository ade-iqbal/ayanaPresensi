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
        $pertemuan_presensi = Pertemuan::select('pertemuan.pertemuan_ke', 'pertemuan.tanggal', 'absensi.jam_masuk', 'absensi.jam_keluar', 'absensi.durasi')
                                ->leftjoin('absensi', 'pertemuan.id', '=', 'absensi.pertemuan_id')
                                ->join('kelas', 'pertemuan.kelas_id', '=', 'kelas.id')
                                ->join('krs', 'kelas.id', '=', 'krs.kelas_id')
                                ->join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
                                ->where([
                                    ['krs.mahasiswa_id', auth()->user()->mahasiswa->id],
                                    ['krs.kelas_id', $id]
                                    ])
                                ->get();                
        return view('mahasiswa.detail_kelas', compact('kelas', 'pertemuan_presensi'));

    }
}
