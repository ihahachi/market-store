<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public function vendeur(){
        return $this->belongsTo('App\vendeur');
    }
}
