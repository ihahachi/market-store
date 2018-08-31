<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\bon_sortie;

class WelcomeContorller extends Controller
{
   //__________________________________________________________
   
    public function index()
    {
    	$articles = article::where('quantite',0)->count();
    	$bs = bon_sortie::where('date_',date("Y-m-d"))->count();

        return view('welcome',compact('articles','bs'));
    }
//__________________________________________________________//
}
