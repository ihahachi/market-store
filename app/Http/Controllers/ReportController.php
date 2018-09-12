<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\vendeur;
use App\bon_entre;
use App\edetail;
use App\article;
use App\decharge;
use PDF;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
//_________________________________________________________________________________  

public function index()
{
    $vendeurs = vendeur::all();
    return view('report.report_general',compact('vendeurs'));
}
//_________________________________________________________________________________
public function store(Request $request)
{
    $to = $request->date_b;
    $from = $request->date_a;
    $vendeur = $request->vendeur_id;
    $bon = new bon_entre;
    if ($vendeur=='all')
        {
            $bon_entre =$bon->report($from,$to);
        }
    else
        {
            $bon_entre =$bon->report($from,$to,$vendeur); 
        }    
    

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();
}
//_________________________________________________________________________________  
public function dech(Request $request)
{
    $vendeur = $request->vendeur_id;
    $dech = new decharge;
    $dech = $dech->report($vendeur);
    return  $dech;
}
//_________________________________________________________________________________    
public function Repotvendeur()
{
    $to = Carbon::today();
    $from = Carbon::today();

    $bon = new bon_entre;
    $bon_entre =$bon->report($from,$to);
        
    $to = $to->format('d/m/Y');
    $from = $from->format('d/m/Y');

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();
}
//_________________________________________________________________________________

public function RepotvendeurHier()
{
    $to = Carbon::yesterday();
    $from = Carbon::yesterday();

    $bon = new bon_entre;
    $bon_entre =$bon->report($from,$to);
          
    $to = $to->format('d/m/Y');
    $from = $from->format('d/m/Y');

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();
}
//_________________________________________________________________________________
 
public function RepotvendeurWeek()
{
    $to = Carbon::today();
    $from = Carbon::today()->subWeek();

    $bon = new bon_entre;
    $bon_entre =$bon->report($from,$to);
          
    $to = $to->format('d/m/Y');
    $from = $from->format('d/m/Y');

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();
}
//_________________________________________________________________________________

public function RepotvendeurMonth()
{
    $to = Carbon::today();
    $from = Carbon::today()->subMonth();

    $bon = new bon_entre;
    $bon_entre =$bon->report($from,$to);
          
    $to = $to->format('d/m/Y');
    $from = $from->format('d/m/Y');

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();

}
//_________________________________________________________________________________  
}
