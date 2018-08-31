<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\detail;


class bon_sortie  extends Model
{

   use SoftDeletes;
   use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

   public function sumPrice($id){
        $sum = detail::join('articles','articles.id','=','details.id_article')
        ->select(DB::Raw('sum(details.quantite * articles.prix_gros) as price'))
        ->where('details.bon_sortie_id',$id)->value('price');
        return $sum;
    }

    public function sumPriceDemi($id){
        $sum = detail::join('articles','articles.id','=','details.id_article')
        ->select(DB::Raw('sum(details.quantite * articles.prix_demigros) as price'))
        ->where('details.bon_sortie_id',$id)->value('price');
        return $sum;
    }

    protected $dates = ['deleted_at'];
    protected $softCascade = ['details'];

    


    public function vendeur(){
        return $this->belongsTo('App\Vendeur');
    }

    public function details(){
        return $this->hasMany('App\Detail');
    }
}
