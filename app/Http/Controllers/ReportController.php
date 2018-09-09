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

class ReportController extends Controller
{
//_________________________________________________________________________________    
    public function Repotvendeur()
    {
        $to = Carbon::today();
        $from = Carbon::today();

        $bon_entre = bon_entre::whereBetween('date_',[$from, $to])->get();
        $dech = Decharge::whereBetween('created_at',[$from, $to])->get();
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

        $bon_entre = bon_entre::whereBetween('date_',[$from, $to])->get();
        $dech = Decharge::whereBetween('created_at',[$from, $to])->get();
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

    $bon_entre = bon_entre::whereBetween('date_',[$from, $to])->get();
    $dech = Decharge::whereBetween('created_at',[$from, $to])->get();
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

    $bon_entre = bon_entre::whereBetween('date_',[$from, $to])->get();
    $dech = Decharge::whereBetween('created_at',[$from, $to])->get();
    $to = $to->format('d/m/Y');
    $from = $from->format('d/m/Y');

    $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','to','from'))
    ->setPaper('a5', 'landscape');
    return $pdf->stream();
}
//_________________________________________________________________________________  
}
