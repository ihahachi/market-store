<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vendeur extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


    protected $dates = ['deleted_at'];
    protected $softCascade = ['bon_sorties'];



    public function clients(){
        return $this->hasMany('App\client');
    }

    public function bon_sorties(){
        return $this->hasMany('App\Bon_sortie');
    }

    public function bon_entres(){
        return $this->hasMany('App\Bon_entre');
    }



}
