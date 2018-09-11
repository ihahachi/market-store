<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depose extends Model
{
    public function SumRecetteByVendeur($id)
    {
        $Sum = $this->join('clients','clients.id','=','deposes.client_id')
        ->join('vendeurs','vendeurs.id','=','clients.id_vendeur')
        ->groupBy('vendeurs.id')
        ->selectRaw('vendeurs.id,sum(recette) as recette')
        ->where('vendeurs.id', $id)
        ->value('recette');
        return $Sum;
    }

    public function SumDeposeByVendeur($id)
    {
        $Sum = $this->join('clients','clients.id','=','deposes.client_id')
        ->join('vendeurs','vendeurs.id','=','clients.id_vendeur')
        ->groupBy('vendeurs.id')
        ->selectRaw('vendeurs.id,sum(depose) as depose')
        ->where('vendeurs.id', $id)
        ->value('depose');
        return $Sum;
    }

    public function SumResteByVendeur($id)
    {
        $Sum = $this->join('clients','clients.id','=','deposes.client_id')
        ->join('vendeurs','vendeurs.id','=','clients.id_vendeur')
        ->groupBy('vendeurs.id')
        ->selectRaw('vendeurs.id,sum(depose - recette) as reste')
        ->where('vendeurs.id', $id)
        ->value('reste');
        return $Sum;
    }


    public function client(){
        return $this->belongsTo('App\client');
    }
}
