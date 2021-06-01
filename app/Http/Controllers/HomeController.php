<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Kelas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // jika user adalah mahasiswa
        if(auth()->user()->role == "mahasiswa") {
            $krs_mahasiswa = Mahasiswa::select('kelas.id', 'kelas.nama_matkul', 'kelas.kode_kelas')
                                ->join('krs', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
                                ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                                ->where('krs.mahasiswa_id', auth()->user()->mahasiswa->id)
                                ->orderby('kelas.semester', 'DESC')
                                ->orderby('kelas.tahun', 'DESC')->get();
            return view('home', compact('krs_mahasiswa'));
        }

        // jika user adalah admin
        elseif((auth()->user()->role == "admin")) {
            $kelas = Kelas::all()->sortByDesc('tahun')
                                ->sortByDesc('semester');
            return view('home', compact('kelas'));
        }

    }
    
}
