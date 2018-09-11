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
            <a href="{{ url('ls_vendeurs') }}">Liste des vendeurs</a>
        </li>
    <li class="breadcrumb-item active">
        Liste des clients : (<small><b>{{ $vendeur->nom }}</b></small>)
    </li>
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
                      <th>Credit</th>
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
                            <i class="fas fa-money-bill-alt"></i> Credit
                          </a>
                        </td>
                      <td>
                        <form action="{{ url('clients/' . $client->id ) }}" method="POST">
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
                Reste credit total : <strong>{{ $sumDepose }} DA</strong>
            </div>
          </div>

</div>
@endsection
