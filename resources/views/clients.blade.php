@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Liste des clients</li>
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





     <!-- DataTables Example -->
     <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des clients</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center; font-size:medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                      <th>Nom Client</th>
                      <th>Tele</th>
                      <th>Credit Verssment</th>
                      <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($clients as $client)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                      <td>{{ $client->nom }}</td>
                      <td>{{ $client->tel}}</td>
                      <td>

                          <a href="{{ url('clients/'. $client->id) }}" class="btn btn-info btn-sm">
                              <i class="fas fa-file-upload"></i> Credit
                          </a>
                          <a href="{{ url('clients/'.  $client->id) }}" class="btn btn-success btn-sm">
                                 <i class="fas fa-file-download"></i> versement
                          </a>
                        </td>
                      <td>
                        <form action="{{ url('clients/' . $client->id ) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <a class="btn btn-info btn-sm" href="{{ url('clients/' .$client->id. '/edit' ) }}">
                                <i class="fas fa-edit"></i>
                            </a>
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
            <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
          </div>

</div>
@endsection
