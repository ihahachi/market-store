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
        <a href="{{ url('/bs_sortie') }}">Bon Sortie</a>
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
            <form action="{{ url('/detail') }}" method="post">
            @csrf
                <div class="form-row">
                    <div class="col">
                        <select name="id_article" class="form-control">
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}">
                                      {{ $article->depot->nom }}
                                    | {{ $article->nom }}
                                    | => {{ $article->quantite }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                            <input type="text" class="form-control" placeholder="Quantité"
                            value="{{ old('quantite')}}" name="quantite">
                            <input hidden type="text" name="bon_sortie_id" value="{{ $bon->id }}">
                    </div>
                    <button type="submit" class="btn btn-info">
                            <i class="fas fa-cart-arrow-down"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
                <a href="{{ url('/bs_sortie/print/' . $bon->id ) }}"  class="btn btn-secondary ">
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
                        <td>{{ $bs->article->prix_gros }}</td>
                        <td>{{ $bs->quantite }}</td>
                        <td>
                            <form action="{{ url('/detail/' .$bs->id ) }}" method="POST">
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
                La quantite totales des produits est : <strong>{{ $details->sum('quantite') }}</strong><br>
                Montant Prix Gros :  <strong>{{ $sumBon }} DA </strong><br>
                Demi-Gros :  <strong>{{ $sumBonDemi }} DA </strong>
            </div>
          </div>

</div>
@endsection
