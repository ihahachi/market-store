<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\bon_sortie;
use App\bon_entre;

class WelcomeContorller extends Controller
{
   //__________________________________________________________

    public function index()
    {
    	$articles = article::where('quantite',0)->count();
    	$bs = bon_sortie::where('date_',date("Y-m-d"))->count();
        $be = bon_entre::where('date_',date("Y-m-d"));
        return view('welcome',compact('articles','bs','be'));
    }
//__________________________________________________________//
}
