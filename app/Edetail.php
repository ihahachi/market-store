<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edetail extends Model
{
    public function article(){
        return $this->belongsTo('App\Article','id_article');
    }

    public function bon_sortie(){
        return $this->belongsTo('App\Bon_entre');
    }
}
