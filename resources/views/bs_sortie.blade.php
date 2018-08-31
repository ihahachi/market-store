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
        <form action="{{ url('/bs_sortie') }}" method="post">
        @csrf
            <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ref Bon Sortie"
                        value="{{ $NewRef }}" name="ref">
                    </div>

                <div class="col">
                    <select name="vendeur_id" class="form-control">
                        @foreach ($vendeurs as $vendeur)
                            <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                <input type="date" class="form-control"
                value="{{ old('date_')}}" name="date_">
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
              Liste des Bon's Sortie</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Ref.</th>
                        <th>Date</th>
                        <th>Vendeur</th>
                        <th>Observation</th>
                        <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($bon_sortie as $bs)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ url('/bs_sortie/'.$bs->id) }}">{{ $bs->ref }}</a></td>
                        <td>{{ $bs->date_ }}</td>
                        <td>{{ $bs->vendeur->nom }}</td>
                         <td>{{ $bs->observation}}</td>
                         <td>
                                <form action="{{ url('/bs_sortie/'.$bs->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('/bs_sortie/print/' . $bs->id ) }}"  class="btn btn-secondary btn-sm">
                                        <i class="fas fa-print "></i>
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


                  {{ $bon_sortie->render("pagination::bootstrap-4") }}


            </div>
            <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
          </div>

</div>
@endsection
