<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    protected $table ="penumpang";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id_pesan');
    }
}
