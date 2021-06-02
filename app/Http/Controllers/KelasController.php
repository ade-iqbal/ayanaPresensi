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
        $mahasiswa = Krs::where('kelas_id', $id)->get();
        $pertemuan = Pertemuan::where('kelas_id', $id)->get();


        return view('admin.kelas.detail_kelas', compact('kelas', 'mahasiswa', 'pertemuan'));
    }

    public function form_tambah(){
        return view('admin.kelas.form_tambah');
    }

    public function tambah_pertemuan($id){
        return view('admin.pertemuan.tambah_pertemuan', compact('id'));
    }

    public function store(Request $request, $id){
        $request->request->add(['kelas_id' => $id]);
        $pertemuan = new Pertemuan;
        $pertemuan->kelas_id=$id;
        $pertemuan->pertemuan_ke=$request->pertemuan_ke;
        $pertemuan->tanggal=$request->tanggal;
        $pertemuan->materi=$request->materi;
        $pertemuan->save();
        return redirect()->route('admin.kelas.detail', [$id]);
    }

    public function detail($id_kelas, $id_pertemuan){
        $data_mhs = Mahasiswa::join('krs', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
                                ->leftjoin('absensi', 'krs.id', '=', 'absensi.krs_id')
                                ->where('krs.kelas_id', $id_kelas)
                                ->where(function($query) use ($id_pertemuan){
                                    $query->where('absensi.pertemuan_id', $id_pertemuan)
                                    ->orWhereNull('absensi.pertemuan_id');
                                })
                                ->get();
        return view('admin.pertemuan.lihat_pertemuan', compact('data_mhs'));
    }


}
