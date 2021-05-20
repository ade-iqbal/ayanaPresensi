<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $table = "mahasiswa";
    protected $fillable = ["nama", "nim", "email", "tipe", "password"];

    public function krs(){

        return $this->hasMany(Krs::class);

    }

}
