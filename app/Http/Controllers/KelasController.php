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
}
