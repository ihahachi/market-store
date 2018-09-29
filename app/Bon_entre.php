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


    public function report($from, $to, $vendeur=NULL)
    {
        if ($vendeur == NULL) 
            {
                $bon_entre = bon_entre::join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
                ->join('decharges','decharges.bon_entre_id','=','bon_entres.id')
                ->groupBy('vendeurs.nom')
                ->selectRaw('
                            vendeurs.nom,sum(montant_versement) as montant_versement ,
                            sum(montant_total) as montant_total,
                            sum(cradit_sortie) as cradit_sortie,
                            sum(cradit_entree) as cradit_entree,
                            sum(ecart) as ecart,
                            sum(montant) as montant
                            ')
                ->whereBetween('date_',[$from, $to])          
                ->get();
            }
        else
            {
                $bon_entre = bon_entre::join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
                ->join('decharges','decharges.bon_entre_id','=','bon_entres.id')
                ->groupBy('vendeurs.nom')
                ->selectRaw('
                            vendeurs.nom,sum(montant_versement) as montant_versement ,
                            sum(montant_total) as montant_total,
                            sum(cradit_sortie) as cradit_sortie,
                            sum(cradit_entree) as cradit_entree,
                            sum(ecart) as ecart,
                            sum(montant) as montant
                            ')
                ->whereBetween('date_',[$from, $to])
                ->where('vendeurs.id',$vendeur)            
                ->get();
            }
        return $bon_entre; 
    }


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
