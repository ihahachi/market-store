@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Bon Sortie</li>
    </ol>




     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des Bon's Sortie</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Ref.</th>
                        <th>Date</th>
                        {{-- <th>Vendeur</th> --}}
                        <th>Observation</th>
                        <th>Supp.</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($all as $bs)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bs->ref }}</td>
                        <td>{{ $bs->date_ }}</td>
                        {{-- <td>{{ $bs->vendeur->nom }}</td> --}}
                         <td>{{ $bs->observation}}</td>
                         <td>
                            <a href="{{ url('/backup_bonsorties/' . $bs->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-reply"></i>
                            </a>
                            <a href="{{ url('/backup_bonsorties/' . $bs->id . '/remove') }}" class="btn btn-danger btn-sm" >
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>


                  {{-- {{ $bon_sortie->render("pagination::bootstrap-4") }} --}}


            </div>
            <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
          </div>

</div>
@endsection
