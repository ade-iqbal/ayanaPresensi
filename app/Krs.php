<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    
    protected $table = "krs";
    protected $fillable = ["id_kelas", "id_mahasiswa"];

    public function mahasiswa(){

        return $this->belongsTo(Mahasiswa::class);

    }

    public function kelas(){
        
        return $this->belongsTo(Kelas::class);

    }

    public function absensi(){

        return $this->hasMany(Absensi::class);

    }

}
