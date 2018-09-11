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
    <li class="breadcrumb-item">
        <a href="{{ url('clients') }}">Liste des clients</a>
    </li>
    <li class="breadcrumb-item active">
            <b> {{ $client->nom }}</b>
           <a href="{{ url('ls_vendeurs/clients/'.$client->id_vendeur) }}"><small>( {{ $client->vendeur->nom }} )</small></a>
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
                      <th>Date</th>
                      <th>Credit</th>
                      <th>Verssment</th>
                      <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($client->deposes as $depose)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                      <td>{{ $depose->date_ }}</td>
                      <td>{{ $depose->depose}} DA</td>
                      <td>{{ $depose->recette}} DA</td>
                      <td>
                        <form action="#" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            {{-- <button  class="btn btn-danger btn-sm disabled" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button> --}}
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
