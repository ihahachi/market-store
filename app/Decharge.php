<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decharge extends Model
{
    public function bon_sortie(){
        return $this->belongsTo('App\Bon_entre');
    }
}
