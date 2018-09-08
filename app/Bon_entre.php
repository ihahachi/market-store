<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bon_entre extends Model
{

    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $dates = ['deleted_at'];
    protected $softCascade = ['edetails'];

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
