<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stock;
use App\article;
use App\depot;

class StockController extends Controller
{

    public function index()
    {
        $stocks = stock::orderBy('created_at', 'desc')->get();
        $articles = article::all();
        $depots = depot::all();
        return view('stocks',compact('articles','stocks'));
    }


    public function in()
    {
        $stocks = stock::where('type', 'IN')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $articles = article::all();
        $depots = depot::all();
        return view('stockIN',compact('articles','stocks','depots'));
    }


    public function out()
    {
        $stocks = stock::where('type', 'OUT')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $articles = article::all();
        $depots = depot::all();
        return view('stockOUT',compact('articles','stocks','depots'));
    }


    public function perdu()
    {
        $stocks = stock::where('type', 'PERDU')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $articles = article::all();
        $depots = depot::all();
        return view('stockPerdu',compact('articles','stocks','depots'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      
      $stock = new stock;
      $stock->type = $request->input('type');
      $stock->article_id = $request->input('article_id');
      //$stock->depot_id = $request->input('depot_id');
      $stock->quantite = $request->input('quantite');
      $stock->from_a = $request->input('from_a');
      $stock->observation = $request->input('observation');
      $stock->save();

      $article = article::find($stock->article_id);

      if ($stock->type == 'IN') {

          $article->addStock($stock->quantite);

      } else  {

          $article->minusStock($stock->quantite);
      } 
         
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
        //
    }
}
