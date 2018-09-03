<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BonsortieReq;

use App\vendeur;
use App\bon_entre;
use App\edetail;
use App\article;
use App\decharge;
use PDF;

class BonentreController extends Controller
{

    public function index()
    {
         // get all vendeurs  stort by name
         $vendeurs = vendeur::orderBy('nom')->get();

         // get all Bon Sortie  stort by date_
         $bon_entre = bon_entre::orderBy('date_','desc')->paginate(10);

         // get last record
         $last = bon_entre::orderBy('created_at','desc')->first();

         if ( $last == null) {
            $NewRef = 'BE0001';
         } else {
            $last->id = $last->id + 1 ;
            $NewRef = "BE000" . $last->id . "/" . date("Y");
         }


         // return view
         return view('bs_entrer', compact('bon_entre','vendeurs','NewRef'));


    }


    public function create()
    {
        //
    }


    public function store(BonsortieReq $request)
    {
        $bon_entre = new bon_entre;
        $bon_entre->ref = $request->input('ref');
        $bon_entre->date_ = $request->input('date_');
        $bon_entre->vendeur_id = $request->input('vendeur_id');
        $bon_entre->montant_versement = $request->input('montant_versement');
        $bon_entre->cradit_sortie = $request->input('cradit_sortie');
        $bon_entre->cradit_entree = $request->input('cradit_entree');
        $bon_entre->save();
        return back();
    }


    public function show($id)
    {
         // Get all art.
        $articles = article::all();

        $bs = bon_entre::find($id);
        $details = $bs->edetails;
        $decharges = $bs->decharges;


        $amount = $details->sum(function($t){
            return $t->quantite * $t->prix_vent;
        });
        // Find bon by id
        $bon = bon_entre::find($id);
        return view('be_detail', compact('details','bon','articles','decharges','amount'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $bs = bon_entre::find($id);

        $bs->montant_total = $request->input('amount');

        $bs->ecart =  ( $bs->montant_versement + $request->input('decharges') + $bs->cradit_sortie ) - $bs->montant_total;
        $bs->save();
        return back();
    }


    public function destroy($id)
    {
        //
    }

    public function LoadPDF($id)
    {
        $articles = article::all();
        $details = bon_entre::find($id)->edetails;
        $bon = bon_entre::find($id);
        $pdf = PDF::loadView('printBE',compact('details','bon','articles'))
        ->setPaper(config('constants.pagePDF'), config('constants.pageOrientation'));
        return $pdf->stream();

    }
}
