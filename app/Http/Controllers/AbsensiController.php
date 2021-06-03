<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Absensi;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function upload(Request $request, $pertemuan_id, $id_kelas)
    {
            $fileName = $_FILES["upload-file"]["tmp_name"];
            $namaFile = $_FILES["upload-file"]["name"];
            $ekstensiValid = 'csv';
            $ekstensiFile = explode('.', $namaFile);
            $ekstensiFile = strtolower(end($ekstensiFile));
            if ($ekstensiFile != $ekstensiValid) {
                print("salah");
            } else {
                $file = fopen($fileName, "r");
                $skipLines = 7;
                $lineNum = 1;
                while (fgetcsv($file)) {
                    if ($lineNum > $skipLines) {
                        break;
                    }
                    $lineNum++;
                }
                $data = array();

                $i=0;
                while (($column = fgetcsv($file, 1000, ";")) !== FALSE) {

                    $num = count($column);
                    $num--;
                    for ($c = 0 ; $c < $num ; $c++){
                        if ($c == 0) {
                            $data[$i][$c] = substr($column[$c], -10);
                        }
                        if ($c == 1) {
                            $data[$i][$c] = explode(",", $column[$c]);
                                if ($c == 1) {
                                    $data[$i][$c] = explode(" ", $column[$c]);
                                }
                        }
                        if ($c == 2) {
                            $data[$i][$c] = explode(",",$column[$c]);
                            if ($c == 2) {
                                $data[$i][$c] = explode(" ", $column[$c]);
                            }
                        }
                        
                            $data[$i][] = $column[$c];
                        
                    
                    }
                   
                    $i++;
                }
                
                // $jml = strlen ($data[0][0]);
                // $cek=DB::table('krs')
                // ->join('mahasiswa', 'mahasiswa.id','=','krs.mahasiswa_id')
                // ->join('kelas','kelas.id','=','krs.kelas_id')
                // ->where('kelas.kode_kelas','=','K001')
                // ->get (['mahasiswa.nim']);
                // foreach ($cek as $value) {
                //     $db[] = $value->nim;
                // }
                
                $check = count ($data);
                
                foreach ($data as $dt) {
                    
                    $cek = DB::table('krs')
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
                    ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                    ->where('kelas.id', $id_kelas)
                    ->where('mahasiswa.email', $dt[5])
                    ->get('krs.id');
                    
              
                    $jml = count($cek);
                  

                    $durasi=(strtotime($dt[2][1])-strtotime($dt[1][1]))/60;
                    
                    if($jml > 0){
                        
                        foreach ($cek as $c) {
                            
                            Absensi::firstOrCreate([
                                'krs_id' => $c->id,
                                'pertemuan_id' => $pertemuan_id,
                                'jam_masuk' => $dt[1][1],
                                'jam_keluar' =>$dt[2][1],
                                'durasi' => (int)$durasi
                            ]);
                            
                        }
                        
                    }
                }
                return redirect()->back();
                // for ($a=0 ; $a<$check ; $a++){
                //     foreach($data as $dt){
                //         if($dt[0]==$db[$a]){
                //             print_r($dt[0]);
                //             $a++;
                //         }
                //     }
                // }
                // $a=0;
                // foreach ($data as $dt) {
                //     if ($dt[0]==$db[$a] && $a < $check){
                //         $a++;
                //         // Absensi::create([
                //         //     'krs_id' => 1,
                //         //     'pertemuan_id' => 2,
                //         //     'jam_masuk' => $dt[1],
                //         //     'jam_keluar' => $dt[2],
                //         //     'durasi' => $dt[3]
                //         // ]);
                //         // return redirect('kelas');
                //         print($dt[0]);
                //     }
                // }
                // echo "<pre>";
                
                //dd($data);
        
        }
    }
}
