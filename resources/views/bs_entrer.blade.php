@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Bon Entrée</li>
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
        <form action="{{ url('be_entre') }}" method="post">
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

                <div class="col">
                    <input type="number" class="form-control" placeholder="M.versement"
                    value="{{ old('montant_versement')}}" name="montant_versement">
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="credit sortie"
                    value="{{ old('cradit_sortie')}}" name="cradit_sortie">
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="credit entrer"
                    value="{{ old('cradit_entree')}}" name="cradit_entree">
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
              Liste des Bon's Entrée</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0" style="text-align:center;font-size: medium">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Ref.</th>
                        <th>Date</th>
                        <th>Vendeur</th>
                        <th>Crd. Sortie</th>
                        <th>Crd. Entree</th>
                        <th>M.Total</th>
                        <th>M.Versement</th>
                        <th>Ecart</th>
                        <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($bon_entre as $bs)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ url('be_entre/'.$bs->id) }}">{{ $bs->ref }}</a></td>
                        <td>{{ $bs->date_ }}</td>
                        <td>{{ $bs->vendeur->nom }}</td>
                        <td>{{ $bs->cradit_sortie}}</td>
                        <td>{{ $bs->cradit_entree}}</td>
                        <td>{{ $bs->montant_total}}</td>
                        <td>{{ $bs->montant_versement}}</td>

                        @if ( $bs->ecart > 0 )
                            <td class="bg-success">{{ $bs->ecart}}</td>
                        @elseif( $bs->ecart == 0 )
                            <td>{{ $bs->ecart}}</td>
                        @else
                            <td class="bg-danger">{{ $bs->ecart}}</td>
                        @endif

                         <td>
                                <form action="{{ url('be_entre/'.$bs->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('be_entre/print/' . $bs->id ) }}"  class="btn btn-secondary btn-sm">
                                        <i class="fas fa-print "></i>
                                    </a>

                                    <a href="{{ url('be_entre/edit/' . $bs->id ) }}"  class="btn btn-info btn-sm">
                                        <i class="fas fa-edit "></i>
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


                  {{ $bon_entre->render("pagination::bootstrap-4") }}


            </div>
            <div class="card-footer small text-muted">La dernière modification à 11:59 PM</div>
          </div>

</div>
@endsection
