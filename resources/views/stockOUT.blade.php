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
        <a href="/stocks">Stocks</a>
    </li>
    <li class="breadcrumb-item active">Stock Sortie</li>
    </ol>

     <!-- Message request  -->
     <div class="row" style="margin-left: 0px;">
            @if(count($errors))
            <div class="alert alert-warning" role="alert">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Page Content -->
    <div class="row" style="margin-left: 0px;">
        <form action="{{ url('stocks') }}" method="post">
        @csrf
        <input hidden type="text"  name="type" value="OUT">
            <div class="form-row">



                <div class="col">
                    <select name="article_id" class="form-control">
                        @foreach ($articles as $article)
                            <option value="{{ $article->id }}">
                              {{ $article->depot->nom }} | {{ $article->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                    <div class="col">
                        <input type="number" class="form-control" placeholder="Quantite"
                         name="quantite">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="De"
                         name="from_a">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Observation"
                         name="observation">
                    </div>




                <button type="submit" class="btn btn-info">
                        <i class="fas fa-plus-square"></i>
                </button>
            </div>
        </form>
       </div>
       <br>
     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Stock Sortie</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date</th>
                        <th>Art.</th>
                        <th>Qtn</th>
                        <th>De</th>
                        <th>A</th>
                        <th>Observation</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($stocks as $stock)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stock->created_at->format('Y-m-d') }}</td>
                        <td>{{ $stock->article->nom }}</td>
                        <td>{{ $stock->quantite }}</td>
                        <td>{{ $stock->from_a }}</td>
                        <td>
                            <a href="{{ url('articles/depot/'. $stock->article->depot->id)  }}">
                                {{ $stock->article->depot->nom }}
                            </a>
                        </td>
                        <td>{{ $stock->observation }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>





            </div>
            <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
          </div>

</div>
@endsection
