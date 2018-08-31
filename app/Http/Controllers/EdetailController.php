<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Edetail;
use App\Article;

class EdetailController extends Controller
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
        $Detail = new Edetail;

        $Detail->id_article = $request->input('id_article');
        $Detail->bon_entre_id = $request->input('bon_entre_id');
        $Detail->quantite = $request->input('quantite');
        // $Detail->prix_vent = $request->input('prix_vent');
        $Detail->type = $request->input('type');
        $Detail->prix_vent = 10;
        $Detail->save();

        // $article = article::find($Detail->id_article);
        // $article->minusStock($Detail->quantite);

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $details = Edetail::find($id);
        $details->delete();
        return back();
    }
}
