@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Accueil</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/articles">Articles</a>
    </li>

    <li class="breadcrumb-item active">Modifie</li>
    </ol>

    <!-- Page Content -->
    <div class="row" style="margin-left: 0px;" style="max-width: 100%">
            <form action="{{ url('/articles/'.  $article->id) }}" method="post" style="width:900px">
                <input type="hidden" name="_method" value="PUT">
                @csrf
        <div class="form-row">

            <div class="col-md-4">
                    <div class="form-group">
                        <label>Ref</label>
                    <input value="{{ $article->ref }}" type="text" name="ref" class="form-control"  placeholder="Ref article">
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="form-group">
                            <label>Nom</label>
                            <input value="{{ $article->nom }}" type="text" name="nom" class="form-control"  placeholder="Nom article">
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="form-group">
                            <label>Unité</label>
                            <select value="{{ $article->unite }}" name="unite" class="form-control">
                                        <option value="PIC">PIC</option>
                                        <option value="CTS">CTS</option>
                                </select>
                    </div>

            </div>

        </div>

        <div class="form-row">

            <div class="col-md-4">
                    <div class="form-group">
                    <label>categorie</label>
                    <select name="id_categorie" class="form-control">
                    <option value="{{ $article->id_categorie }}">{{ $article->categorie->nom }}</option>
                        @foreach ($all as $categorie)
                            <option value="{{ $categorie['id'] }}">{{ $categorie['nom'] }}</option>
                        @endforeach
                    </select>
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="form-group">
                    <label>marque</label>
                    <select name="id_marque" class="form-control">
                        <option value="{{ $article->id_marque }}">{{ $article->marque->nom }}</option>
                        @foreach ($all_m as $marque)
                            <option value="{{ $marque['id'] }}">{{ $marque['nom'] }}</option>
                        @endforeach
                    </select>
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="form-group">
                    <label>Dépot</label>
                    <select name="depot_id" class="form-control">
                        <option value="{{ $article->depot_id }}">{{ $article->depot->nom }}</option>
                        @foreach ($depot_m as $depot)
                            <option value="{{ $depot->id }}">{{ $depot->nom }}</option>
                        @endforeach
                    </select>
                    </div>
            </div>
        </div>

        <div class="form-row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Prix Gros</label>
                            <input value="{{ $article->prix_gros }}" type="number" min="0.00" name="prix_gros" class="form-control"  placeholder="Prix Gros">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Prix Demi-Gros</label>
                            <input value="{{ $article->prix_demigros }}" type="number" min="0.00" name="prix_demigros" class="form-control"  placeholder="Prix Demi-Gros">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Prix Client</label>
                            <input value="{{ $article->prix_client }}" type="number" min="0.00" name="prix_client" class="form-control"  placeholder="Prix Client">
                        </div>
                </div>
        </div>

        <div class="form-row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantité de stock</label>
                            <input value="{{ $article->quantite }}" type="text" name="quantite" class="form-control"  placeholder="Quantité de stock">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantité Min</label>
                            <input value="{{ $article->quantite_min }}" type="text" name="quantite_min" class="form-control"  placeholder="Quantité Min">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Lot (pormotion)</label>
                            <input value="{{ $article->lot }}" type="text" name="lot" class="form-control"  placeholder="Lot (pormotion)">
                        </div>
                </div>
        </div>






                      <button type="submit" class="btn btn-primary">
                          <i class="fas fa-save"></i>
                          Enregister
                        </button>


    </form>
    </div>

</div>
@endsection
