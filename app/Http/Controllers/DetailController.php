<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Article;


class DetailController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $Detail = new Detail;
        $BonSortieID = $request->input('bon_sortie_id');
        $Detail->id_article = $request->input('id_article');
        $Detail->bon_sortie_id = $BonSortieID ;
        $Detail->quantite = $request->input('quantite');
        $Detail->save();

        $article = article::find($Detail->id_article);
        $article->minusStock($Detail->quantite);

        return redirect('/bs_sortie/'. $BonSortieID );
        //return $Detail;
    }



    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $details = Detail::find($id);
        $article = article::find($details->id_article);

        $details->forcedelete();
        $article->addStock($details->quantite);

        return back();
    }



}
