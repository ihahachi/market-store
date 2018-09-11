<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depose extends Model
{
    public function client(){
        return $this->belongsTo('App\client','id_client');
    }
}
