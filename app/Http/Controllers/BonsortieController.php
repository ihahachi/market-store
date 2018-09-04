<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BonsortieReq;

use App\vendeur;
use App\bon_sortie;
use App\detail;
use App\article;
use PDF;
use Illuminate\Support\Facades\DB;


class BonsortieController extends Controller
{
//__________________________________________________________//

    public function index()
    {
        // get all vendeurs  stort by name
        $vendeurs = vendeur::orderBy('nom')->get();

        // get all Bon Sortie  stort by date_
        $bon_sortie = bon_sortie::orderBy('date_','desc')->paginate(10);

        // get last record
        $last = bon_sortie::orderBy('created_at','desc')->first();
        $NewRef = "BS000" . $last->id . "/" . date("Y");
        // return view
        return view('bs_sortie', compact('bon_sortie','vendeurs','NewRef'));
    }
//__________________________________________________________//

    public function bs_vendeur($id)
    {
        $bon_sorties = vendeur::find($id)->bon_sorties()->orderBy('date_','desc')->paginate(10);;
        $vendeur = vendeur::find($id);
        return view('bs_vendeur', compact('bon_sorties','vendeur'));

    }
//__________________________________________________________//

    public function create()
    {
        //
    }
//__________________________________________________________//

    public function store(BonsortieReq $request)
    {
        $bon_sortie = new bon_sortie;
        $bon_sortie->ref = $request->input('ref');
        $bon_sortie->date_ = $request->input('date_');
        $bon_sortie->vendeur_id = $request->input('vendeur_id');
        $bon_sortie->observation = 'Rien';
        $bon_sortie->save();
        return redirect('/bs_sortie');
    }
//__________________________________________________________//

    public function show($id)
    {
        // Get all art.
        $articles = article::all();

        $bs = bon_sortie::find($id);
        $details = $bs->details;

        // calculat montant
        $sumBon = $bs->sumPrice($id);
        $sumBonDemi = $bs->sumPriceDemi($id);
        // Find bon by id
        $bon = bon_sortie::find($id);
        return view('bs_detail', compact('details','bon','articles','sumBon','sumBonDemi'));
    }
//__________________________________________________________//


    public function edit($id)
    {
        //
    }
//__________________________________________________________//

    public function update(BonsortieReq $request, $id)
    {
        //
    }
//__________________________________________________________//

    public function destroy($id)
    {
        $bon_sortie = bon_sortie::find($id);
        $bon_sortie->delete();
        return back();
    }
//__________________________________________________________//

    public function LoadPDF($id)
    {
        $articles = article::all();
        $details = bon_sortie::find($id)->details;
        $bon = bon_sortie::find($id);
        $pdf = PDF::loadView('printBS',compact('details','bon','articles'))
        ->setPaper(config('constants.pagePDF'), config('constants.pageOrientation'));
        return $pdf->stream();

    }
//__________________________________________________________//

    public function backup()
    {
        $all = bon_sortie::onlyTrashed()->get();
        return view('res_bonsortie', compact('all'));
    }
//__________________________________________________________//

   public function undelete($id)
    {
        bon_sortie::withTrashed()->find($id)->restore();
        return back();
    }
//__________________________________________________________//

    public function remove($id)
    {
        bon_sortie::withTrashed()->find($id)->forceDelete();
        return back();
    }
//__________________________________________________________//
}
