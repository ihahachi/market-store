<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Edetail;
use App\Article;
use App\bon_entre;

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
        $Detail->type = $request->input('type');



        if ($Detail->type == 'GROS') {
            $Detail->prix_vent = $Detail->article->prix_gros;
        } else if ($Detail->type == 'DEMI') {
            $Detail->prix_vent = $Detail->article->prix_demigros;
        } else if($Detail->type == 'CLIENT') {
            $Detail->prix_vent = $Detail->article->prix_client;
        }
        else if($Detail->type == 'RETOUR') {
            $Detail->prix_vent = 0;
        }
        else if($Detail->type == 'PERDU') {
            $Detail->prix_vent = 0;
        }
        else
        {
            $Detail->prix_vent = 0;
        }

        $Detail->save();



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
