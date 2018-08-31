<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{

    public function addStock($qtn){   
      $this->quantite = $this->quantite + $qtn ;
      $this->save();
      return true;
    }

    public function minusStock($qtn){   
      $this->quantite = $this->quantite - $qtn ;
      $this->save();
      return true;
    }

    public function categorie(){
        return $this->belongsTo('App\Categorie','id_categorie');
    }

    public function marque(){
        return $this->belongsTo('App\Marque','id_marque');
    }

    public function depot(){
        return $this->belongsTo('App\Depot');
    }

    public function details(){
        return $this->hasMany('App\Detail');
    }

    public function stocks(){
        return $this->hasMany('App\Stock');
    }

}
