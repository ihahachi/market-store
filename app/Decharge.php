<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decharge extends Model
{
    
    public function report($id)
    {
        $decharge = $this->join('bon_entres','bon_entres.id','=','decharges.bon_entre_id')
        ->join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
        ->groupBy('vendeurs.nom')
        ->selectRaw('vendeurs.nom,sum(montant) as montant')
        ->where('vendeurs.id', $id)
        ->get();
        return $decharge;
    }
    
    
    
    public function bon_sortie(){
        return $this->belongsTo('App\Bon_entre');
    }
}
