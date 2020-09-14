<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table ="jadwal";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
    public function buses(){
        return $this->belongsTo(Bus::class,'no_bus');
    }
}
