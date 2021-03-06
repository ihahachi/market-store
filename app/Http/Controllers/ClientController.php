<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\vendeur;
use App\depose;

class ClientController extends Controller
{

    public function index()
    {
        $clients = client::all();
        return view('clients',compact('clients'));
        // return $clients;
    }


    public function store(Request $request)
    {
        $client = new client;
        $client->nom = $request->nom;
        $client->tel = $request->tel;
        $client->id_vendeur = $request->id_vendeur;
        $client->save();
        return back();
    }


    public function show($id)
    {
        $client = client::findOrfail($id);
        return view('client_depose',compact('client'));
    }


    public function edit($id)
    {
        $client = client::findOrfail($id);
        return view('client_edit',compact('client'));
    }


    public function update(Request $request, $id)
    {
        $client = client::findOrfail($id);
        $client->nom = $request->nom;
        $client->tel = $request->tel;
        $client->id_vendeur = $request->id_vendeur;
        $client->save();
        return back();
    }


    public function destroy($id)
    {
        $client = client::findOrfail($id);
        $client->delete();
        return back();
    }


    public function client_vendeur($id)
    {
        $clients = new client;
        $depose = new depose;
        $vendeur = vendeur::find($id);
        $sumDepose = $depose->SumResteByVendeur($vendeur->id);
        $clients = $clients->client_by_vendeur($id);
        return view('client_vendeur',compact('clients','vendeur','sumDepose'));
    }
}
