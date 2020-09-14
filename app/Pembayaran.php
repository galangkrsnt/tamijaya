<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table ="pembayaran";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id_pesan');
    }

}
