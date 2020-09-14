<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model


{
    protected $table ="pesanan";
    protected $guarded = [];
    protected $primaryKey = 'id';


    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class,'id_jadwal');
    }

    public function penumpang(){
        return $this->hasMany(Penumpang::class,'id_pesan');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class,'id_pesan');
    }
}
