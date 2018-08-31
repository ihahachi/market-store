<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendeur;
use App\Http\Requests\VendeurReq;

class VendeurController extends Controller
{

    public function index()
    {
        $vendeurs = new vendeur;
        $all = $vendeurs->all();
        return view('ls_vendeurs', compact('all'));

    }


    public function create()
    {
        //
    }


    public function store(VendeurReq $request)
    {
        $vendeurs = new vendeur;
        $vendeurs->nom = $request->input('nom');
        $vendeurs->tel = $request->input('tel');
        $vendeurs->save();
        return redirect('/ls_vendeurs');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $vendeurs = vendeur::find($id);
        return view('vendeurs_edit', ['vendeur'=> $vendeurs]);
       // return $vendeurs;

    }


    public function update(VendeurReq $request, $id)
    {
        $vendeurs = vendeur::find($id);
        $vendeurs->nom = $request->input('nom');
        $vendeurs->tel = $request->input('tel');
        $vendeurs->save();
        return redirect('/ls_vendeurs');
    }


    public function destroy($id)
    {
        $vendeurs = vendeur::find($id);
        $vendeurs->delete();
        return redirect('/ls_vendeurs');
    }

    public function backup()
    {

        $all = vendeur::onlyTrashed()->get();
        return view('res_vendeur', compact('all'));

    }


   public function undelete($id)
    {
        vendeur::withTrashed()->find($id)->restore();
        return back();
    }


    public function remove($id)
    {
        vendeur::withTrashed()->find($id)->forceDelete();
        return back();
    }
}
