<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table ="bus";
    protected $guarded = [];
    protected $primaryKey = 'no_bus';

    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }
}
