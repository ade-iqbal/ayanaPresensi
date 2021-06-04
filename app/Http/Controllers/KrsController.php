<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Krs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function store(Request $request, $id) {
        $request->request->add(['kelas_id' => $id]);
        Krs::create([
            "kelas_id" => $request->kelas_id,
            "mahasiswa_id" => $request->mahasiswa_id,
        ]);
        return redirect('/kelas/'.$id.'/detail');
        

    }
    
    public function destroy($id){
        
        $absensi = Absensi::where('krs_id', $id);
        $absensi->delete();

        $krs = Krs::find($id);
        $kelas_id = $krs->kelas_id;
        $krs->delete();
        return redirect('/kelas/'.$kelas_id.'/detail');
    }

}
