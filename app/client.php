<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{

   public function client_by_vendeur($id)
   {
        return $this->orderBy('nom')
        ->where('id_vendeur',$id)
        ->orderBy('nom')
        ->get();

   }

    public function vendeur(){
        return $this->belongsTo('App\vendeur','id_vendeur');
    }

    public function deposes(){
        return $this->hasMany('App\depose');
    }
}
