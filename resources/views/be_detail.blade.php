@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('be_entre') }}">Bon Entrer</a>
    </li>
    <li class="breadcrumb-item active">
        <b> {{ $bon->vendeur->nom }}</b>
        <small>( {{ $bon->ref }} : {{ $bon->date_ }} )</small>
    </li>
    </ol>

     <!-- Message request  -->
     {{-- <div class="row" style="margin-left: 0px;">
            @if(count($errors))
            <div class="alert alert-warning" role="alert">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </div>
        @endif
    </div> --}}

    <!-- Page Content -->
    <div class="row" style="margin-left: 0px;">
        <div class="col-md-8">
            <form action="{{ url('edetail') }}" method="post">
            @csrf
                <div class="form-row">
                    <div class="col">
                        <select name="id_article" class="form-control">
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}">
                                     {{ $article->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                            <input type="text" class="form-control" placeholder="Quantité"
                            value="{{ old('quantite')}}" name="quantite">
                            <input hidden type="text" name="bon_entre_id" value="{{ $bon->id }}">

                    </div>

                    <div class="col">
                        <select name="type" class="form-control">
                           <option value="GROS">Prix Gros</option>
                           <option value="DEMI">Prix Demi-Gros</option>
                           <option value="CLIENT">Prix Client</option>
                           <option value="RETOUR">Retour</option>
                           <option value="PERDU">Perdu</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">
                            <i class="fas fa-cart-arrow-down"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
                <a href="#"  class="btn btn-secondary ">
                        <i class="fas fa-print"></i> Imprimer
                </a>
        </div>
       </div>
       <br>
     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des Produits</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Ref</th>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Marque</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Etat</th>
                        <th>Opération</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($details as $bs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bs->article->ref }}</td>
                        <td>{{ $bs->article->nom }}</td>
                        <td>{{ $bs->article->categorie->nom }}</td>
                        <td>{{ $bs->article->marque->nom }}</td>
                        <td>{{ $bs->prix_vent }}</td>
                        <td>{{ $bs->quantite }}</td>
                        <td>{{ $bs->type }}</td>
                        <td>
                            <form action="{{ url('edetail/' .$bs->id ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">
                La quantite totales des produits est : <strong>{{ $details->sum('quantite') }} </strong><br>
                Totale de vent : <strong>{{ $amount }} DA</strong>
            </div>
          </div>

          <div class="row" style="margin-left: 0px;">
            <div class="col-md-8">
                <form action="{{ url('decharge') }}" method="post">
                @csrf
                    <div class="form-row">
                        <div class="col">
                            <select name="nom" class="form-control">
                               <option value="Ftoure">Ftoure</option>
                               <option value="Gasoil">Gasoil</option>
                               <option value="Service maintenance">Service maintenance</option>
                               <option value="Promotion">Promotion</option>
                               <option value="Décharge">Décharge</option>
                               <option value="Clarque">Clarque</option>
                               <option value="Avance">Avance</option>
                               <option value="Perdu">Perdu</option>
                            </select>
                        </div>
                        <div class="col">
                                <input type="text" class="form-control" placeholder="Montant"
                                value="{{ old('montant')}}" name="montant">
                                <input hidden type="text" name="bon_entre_id" value="{{ $bon->id }}">

                        </div>

                        <button type="submit" class="btn btn-info">
                                <i class="fas fa-cart-arrow-down"></i>
                        </button>
                    </div>
                </form>
            </div>
          </div>

          <br>
          <!-- DataTables Example -->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Frais divers</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Frais divers</th>
                        <th>Montant</th>
                        <th>Opération</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($decharges as $de)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $de->nom }}</td>
                        <td>{{ $de->montant  }}</td>
                        <td>
                            <form action="{{ url('decharge/' .$de->id ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">
                    Total les Frais divers : <strong>{{ $decharges->sum('montant') }} DA</strong>
            </div>
          </div>
          <br>
          <div class="row">
                <div class="col-md-12">
                <form action="{{ url('be_entre/' . $bon->id ) }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <input hidden type="text" name="amount" value="{{ $amount }}">
                        <input hidden type="text" name="decharges" value="{{ $decharges->sum('montant') }}">
                        <button type="submit" class="btn btn-info btn-block">
                                Valider
                        </button>
                  </form>
                </div>
          </div>
          <br>





</div>
@endsection
