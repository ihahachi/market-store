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
    public function Repotvendeur()
    {
        $today = Carbon::today();
        $bon_entre = bon_entre::whereDate('date_',$today)->get();
        $dech = Decharge::whereDate('created_at',$today)->get();
        $today = $today->format('d/m/Y');



        $pdf = PDF::loadView('report.ReportDay',compact('bon_entre','dech','today'))
        ->setPaper('a5', 'landscape');
        return $pdf->stream();
    }
}
