@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Articles</li>
    </ol>

    <!-- Page Content -->
         <!-- DataTables Example -->
         <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-table"></i>
                            Liste des Articles
                        </div>

                        <div class="col d-flex justify-content-end">
                        <a href="{{ url('/articles/create') }}" class="btn btn-info align-self-end"><i class="fas fa-cart-plus"></i></a>
                        </div>


                    </div>




                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size:medium">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Depot</th>
                          <th>Ref</th>
                          <th>Nom</th>
                          <th>Categorie</th>
                          <th>Marque</th>
                          <th>Quantité</th>
                          <th>P. Gros</th>
                          <th>P. Demi-Gros</th>
                          <th>Opération</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($articles as $article)
                      @if($article->quantite == 0)
                        <tr class="text-danger">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a href="{{ url('articles/depot/'. $article->depot_id)  }}">
                                {{ $article->depot->nom }}
                              </a>
                            </td>
                            <td>{{ $article->ref }}</td>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->categorie->nom }}</td>
                            <td>{{ $article->marque->nom }}</td>
                            <td>{{ $article->quantite }}</td>
                            <td>{{ $article->prix_gros }}</td>
                            <td>{{ $article->prix_demigros }}</td>
                            <td>
                                <form action="{{ url('/articles/' . $article->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a class="btn btn-info btn-sm" href="{{ url('/articles/' .$article->id ) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @elseif($article->quantite <= $article->quantite_min )
                        <tr class="text-warning">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a href="{{ url('articles/depot/'. $article->depot_id)  }}">
                                {{ $article->depot->nom }}
                              </a>
                            </td>
                            <td>{{ $article->ref }}</td>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->categorie->nom }}</td>
                            <td>{{ $article->marque->nom }}</td>
                            <td>{{ $article->quantite }}</td>
                            <td>{{ $article->prix_gros }}</td>
                            <td>{{ $article->prix_demigros }}</td>
                            <td>
                                <form action="{{ url('/articles/' . $article->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a class="btn btn-info btn-sm" href="{{ url('/articles/' .$article->id ) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a href="{{ url('articles/depot/'. $article->depot_id)  }}">
                                {{ $article->depot->nom }}
                              </a>
                            </td>
                            <td>{{ $article->ref }}</td>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->categorie->nom }}</td>
                            <td>{{ $article->marque->nom }}</td>
                            <td>{{ $article->quantite }}</td>
                            <td>{{ $article->prix_gros }}</td>
                            <td>{{ $article->prix_demigros }}</td>
                            <td>
                                <form action="{{ url('/articles/' . $article->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a class="btn btn-info btn-sm" href="{{ url('/articles/' .$article->id ) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
              </div>

</div>
@endsection
