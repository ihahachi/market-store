<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
	use SoftDeletes;


    protected $dates = ['deleted_at'];



    public function article(){
        return $this->belongsTo('App\Article','id_article');
    }

    public function bon_sortie(){
        return $this->belongsTo('App\Bon_sortie','id_bon_sortie');
    }


}
