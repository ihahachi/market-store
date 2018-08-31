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

    <li class="breadcrumb-item active">Create</li>
    </ol>

    <!-- Page Content -->
    <div class="row" style="margin-left: 0px;" style="max-width: 100%">
            <form action="{{ url('/articles') }}" method="post" style="width:900px">
                @csrf
        <div class="form-row">

            <div class="col-md-4">
                    <div class="form-group">
                        <label>Ref</label>
                        <input type="text" name="ref" class="form-control"  placeholder="Ref article">
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control"  placeholder="Nom article">
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="form-group">
                            <label>Unité</label>
                            <select name="unite" class="form-control">
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
                            <input type="number" min="0.00" name="prix_gros" class="form-control"  placeholder="Prix Gros">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Prix Demi-Gros</label>
                            <input type="number" min="0.00" name="prix_demigros" class="form-control"  placeholder="Prix Demi-Gros">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Prix Client</label>
                            <input type="number" min="0.00" name="prix_client" class="form-control"  placeholder="Prix Client">
                        </div>
                </div>
        </div>

        <div class="form-row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantité de stock</label>
                            <input type="text" name="quantite" class="form-control"  placeholder="Quantité de stock">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantité Min</label>
                            <input type="text" name="quantite_min" class="form-control"  placeholder="Quantité Min">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Lot (pormotion)</label>
                            <input type="text" name="lot" class="form-control"  placeholder="Lot (pormotion)">
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
