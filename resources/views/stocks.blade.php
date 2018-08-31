@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Stocks</li>
    </ol>



    <!-- Page Content -->


     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Mouvement de stock</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Art.</th>
                        <th>Qtn</th>
                        <th>De</th>
                        <th>Depot</th>
                        <th>Observation</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($stocks as $stock)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stock->created_at->format('Y-m-d') }}</td>

                      @if ( $stock->type ==='OUT')
                        <td>
                          <a href="{{url('stocks/out')}}">
                            <i class="fas fa-upload text-primary"></i>
                          </a>
                        </td>
                      @elseif ($stock->type ==='IN')
                        <td>
                          <a href="{{url('stocks/in')}}">
                            <i class="fas fa-download text-success"></i>
                          </a>
                          </td>
                      @elseif ($stock->type ==='PERDU')
                        <td>
                          <a href="{{url('stocks/perdu')}}">
                            <i class="fas fa-minus-circle text-danger"></i>
                          </a>
                        </td>
                      @endif

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
