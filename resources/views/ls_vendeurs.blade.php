@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>
    <li class="breadcrumb-item active">Liste des vendeurs</li>
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
    <form action="{{ url('ls_vendeurs') }}" method="post">
    @csrf
        <div class="form-row">
            <div class="col">
            <input type="text" class="form-control" placeholder="Nom de vendeur"
            value="{{ old('nom')}}" name="nom">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Tele"
            value="{{ old('tel')}}" name="tel">
            </div>
            <button type="submit" class="btn btn-info">
                    <i class="fas fa-user-plus"></i>
            </button>
        </div>
    </form>
   </div>
   <br>
   <div class="row" style="margin-left: 0px;">
        <form  action="{{ url('clients') }}" method="post">
            @csrf
                <div class="form-row">
                    <div class="col">
                    <select name="id_vendeur" class="form-control">
                            @foreach ($all as $vendeur)
                                <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                            @endforeach
                        </select>
                     </div>
                    <div class="col">
                    <input type="text" class="form-control" placeholder="Nom de client"
                    value="{{ old('nom')}}" name="nom">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" placeholder="Tele"
                    value="{{ old('tel')}}" name="tel">
                    </div>
                    <button type="submit" class="btn btn-info">
                            <i class="fas fa-user-plus"></i>
                    </button>
                </div>
            </form>
   </div>
   <br>


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
                      <th>Bon's</th>
                      <th>Opérations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($all as $vendeur)
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                      <td>{{ $vendeur->nom }}</td>
                      <td>{{ $vendeur->tel}}</td>
                      <td>

                          <a href="{{ url('bs_sortie/vendeur/'. $vendeur->id) }}" class="btn btn-info btn-sm">
                              <i class="fas fa-file-upload"></i> Bon
                          </a>
                          <a href="{{ url('be_entre/vendeur/'. $vendeur['id']) }}" class="btn btn-success btn-sm">
                                 <i class="fas fa-file-download"></i> Bon
                          </a>
                          <a href="{{ url('ls_vendeurs/clients/' .$vendeur['id'] ) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-users"></i> Clients</a>
                        </td>
                      <td>
                        <form action="{{ url('/ls_vendeurs/' .$vendeur['id'] ) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <a class="btn btn-info btn-sm" href="{{ url('ls_vendeurs/' .$vendeur['id']. '/edit' ) }}">
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
