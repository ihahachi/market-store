<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\categorie;
use App\marque;
use App\depot;

class ArticleController extends Controller
{
//__________________________________________________________

    public function index()
    {
        $articles = article::all();
        return view('articles',compact('articles'));
    }
//__________________________________________________________//
       public function artdepot($id)
    {
        $articles = article::where('depot_id', $id)
                        ->orderBy('Nom')
                        ->get();

        return view('articles',compact('articles'));
    }
//__________________________________________________________//

    public function create()
    {
        $all = categorie::all();
        $all_m = marque::all();
        $depot_m = depot::all();

        return view('create_article', compact('all','all_m','depot_m'));
    }
//__________________________________________________________//

    public function store(Request $request)
    {
        $articles = new article;
        $articles->ref = $request->input('ref');
        $articles->nom = $request->input('nom');
        $articles->id_categorie = $request->input('id_categorie');
        $articles->id_marque = $request->input('id_marque');
        $articles->unite = $request->input('unite');
        $articles->depot_id = $request->input('depot_id');
        $articles->prix_gros = $request->input('prix_gros');
        $articles->prix_demigros = $request->input('prix_demigros');
        $articles->prix_client = $request->input('prix_client');
        $articles->quantite = $request->input('quantite');
        $articles->quantite_min = $request->input('quantite_min');
        $articles->lot = $request->input('lot');

        $articles->save();
        return redirect('/articles');
    }
//__________________________________________________________//

    public function show($id)
    {
        //
    }
//__________________________________________________________//

    public function edit($id)
    {
        $all = categorie::all();
        $all_m = marque::all();
        $depot_m = depot::all();
        $article = article::find($id);

        return view('article_edit',  compact('article','all','all_m','depot_m'));
    }
//__________________________________________________________//

    public function update(Request $request, $id)
    {
        $articles = article::find($id);
        $articles->ref = $request->input('ref');
        $articles->nom = $request->input('nom');
        $articles->id_categorie = $request->input('id_categorie');
        $articles->id_marque = $request->input('id_marque');
        $articles->unite = $request->input('unite');
        $articles->depot_id = $request->input('depot_id');
        $articles->prix_gros = $request->input('prix_gros');
        $articles->prix_demigros = $request->input('prix_demigros');
        $articles->prix_client = $request->input('prix_client');
        $articles->quantite = $request->input('quantite');
        $articles->quantite_min = $request->input('quantite_min');
        $articles->lot = $request->input('lot');

        $articles->save();
        return redirect('/articles');
    }
//__________________________________________________________//

    public function destroy($id)
    {
        $article = article::find($id);

        $article->delete();
        return back();
    }
}
