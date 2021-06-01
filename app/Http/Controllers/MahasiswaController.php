<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Pertemuan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function detail_kelas($id){
        
        $kelas = Kelas::find($id);
        $pertemuan_presensi = Pertemuan::select('*')
                                ->join('absensi', 'pertemuan.id', '=', 'absensi.pertemuan_id')
                                ->join('krs', 'absensi.krs_id', '=', 'krs.id')
                                // ->where('krs.mahasiswa_id', auth()->user()->mahasiswa->id)
                                // ->where('krs.kelas_id', $id)
                                // ->where([
                                //     ['krs.mahasiswa_id', auth()->user()->mahasiswa->id],
                                //     ['krs.kelas_id', $id]
                                //     ])
                                ->orderby('pertemuan_ke', "ASC")
                                ->get();
        dd($pertemuan_presensi);
        return view('mahasiswa.detail_kelas', compact('kelas'));

    }
}
