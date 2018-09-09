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
    <a href="{{ url('/ls_vendeurs')}}">Liste des vendeurs</a>
    </li>
    <li class="breadcrumb-item active">{{ $vendeur->nom }}</li>
    </ol>

    <!-- Page Content -->


         <!-- DataTables Example -->
         <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                  Liste des Bon's Entrées</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                      <thead>
                        <tr>
                            <th>N°</th>
                            <th>Ref</th>
                            <th>Date</th>
                            <th>vendeur</th>
                            <th>observation</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($bon_entres as $bs)
                        <tr >
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ url('be_entre/'.$bs->id) }}">{{ $bs->ref }}</a></td>
                            <td>{{ $bs->date_ }}</td>
                            <td>{{ $bs->vendeur->nom }}</td>
                             <td>{{ $bs->observation}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                      {{ $bon_entres->render("pagination::bootstrap-4") }}


                </div>
                <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
              </div>

</div>
@endsection
