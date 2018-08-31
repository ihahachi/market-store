<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decharge;

class DechargeController extends Controller
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
        $Decharge = new Decharge;
        $Decharge->nom = $request->input('nom');
        $Decharge->bon_entre_id = $request->input('bon_entre_id');
        $Decharge->montant = $request->input('montant');
        $Decharge->save();
        return back();
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
        $Decharge = Decharge::find($id);
        $Decharge->delete();

        return back();
    }
}
