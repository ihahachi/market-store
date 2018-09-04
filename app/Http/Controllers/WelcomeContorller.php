<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\article;
use App\bon_sortie;
use App\bon_entre;
use App\stock;
use App\Decharge;



class WelcomeContorller extends Controller
{
   //__________________________________________________________

    public function index()
    {
    	$today = Carbon::today();

    	$articles = article::where('quantite',0)->count();
    	$bs = bon_sortie::where('date_', $today)->get();
        $be = bon_entre::where('date_', $today)->get();
        $stk = stock::whereDate('created_at',$today)->get();
        $dech = Decharge::whereDate('created_at',$today)->get();
        return view('welcome',compact('articles','bs','be','stk','dech'));

    }
//__________________________________________________________//
}
