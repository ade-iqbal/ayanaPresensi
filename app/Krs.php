<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    
    protected $table = "krs";
    protected $fillable = ["kelas_id", "mahasiswa_id"];

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
