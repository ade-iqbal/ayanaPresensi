<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $table = "mahasiswa";
    protected $fillable = ["user_id", "nama", "nim", "email"];

    public function krs(){

        return $this->hasMany(Krs::class);

    }

    public function user(){

        return $this->belongsTo(User::class);
        
    }

}
