@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Restauration de la corbeille : vendeur</li>
    </ol>







     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des vendeurs</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center; font-size:medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                      <th>Nom</th>
                      <th>Tele</th>
                      
                      <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($all as $vendeur)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                      <td>{{ $vendeur->nom }}</td>
                      <td>{{ $vendeur->tel }}</td>
              
                      <td>

                            <a href="{{ url('/backup_vendeurs/' . $vendeur->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-reply"></i>
                            </a>
                            <a href="{{ url('/backup_vendeurs/' . $vendeur->id . '/remove') }}" class="btn btn-danger btn-sm" >
                                <i class="fas fa-times"></i>
                            </a>

                        </td>
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
