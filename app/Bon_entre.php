<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon_entre extends Model
{

    public function vendeur(){
        return $this->belongsTo('App\Vendeur');
    }


    public function decharges(){
        return $this->hasMany('App\Decharge');
    }

    public function edetails(){
        return $this->hasMany('App\Edetail');
    }
}
