<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decharge extends Model
{
    
    public function report($id,$dech,$from, $to)
    {
        if ($id =='all' and $dech =='all') {
            $decharge = $this->join('bon_entres','bon_entres.id','=','decharges.bon_entre_id')
            ->join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
            ->groupBy('vendeurs.nom','decharges.nom')
            ->selectRaw('vendeurs.nom as vendeur ,decharges.nom as decharges, sum(montant) as montant')
            ->whereBetween('bon_entres.date_',[$from, $to])
            ->get();
        }elseif($id =='all')
        {
            $decharge = $this->join('bon_entres','bon_entres.id','=','decharges.bon_entre_id')
            ->join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
            ->groupBy('vendeurs.nom','decharges.nom')
            ->selectRaw('vendeurs.nom as vendeur ,decharges.nom as decharges, sum(montant) as montant')
            ->where('decharges.nom', $dech)
            ->whereBetween('bon_entres.date_',[$from, $to])
            ->get();

        }elseif($dech =='all')
        {
            $decharge = $this->join('bon_entres','bon_entres.id','=','decharges.bon_entre_id')
            ->join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
            ->groupBy('vendeurs.nom','decharges.nom')
            ->selectRaw('vendeurs.nom as vendeur ,decharges.nom as decharges, sum(montant) as montant')
            ->where('vendeurs.id', $id)
            ->whereBetween('bon_entres.date_',[$from, $to])
            ->get();
        }else
        {
            $decharge = $this->join('bon_entres','bon_entres.id','=','decharges.bon_entre_id')
            ->join('vendeurs','vendeurs.id','=','bon_entres.vendeur_id')
            ->groupBy('vendeurs.nom','decharges.nom')
            ->selectRaw('vendeurs.nom as vendeur ,decharges.nom as decharges, sum(montant) as montant')
            ->where('vendeurs.id', $id)
            ->where('decharges.nom', $dech)
            ->whereBetween('bon_entres.date_',[$from, $to])
            ->get();
        }
        return $decharge;
    }
    
    
    
    public function bon_sortie(){
        return $this->belongsTo('App\Bon_entre');
    }
}
