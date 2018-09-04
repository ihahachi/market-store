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
            <a href="{{url('be_entre') }}">Bon Entrée</a>
    </li>
    <li class="breadcrumb-item active"> {{$bon->ref}} : {{ $bon->vendeur->nom }} </li>
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


        <form action="{{ url('be_entre/bn/' . $bon->id)  }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <label for="exampleInputEmail1">Ref Bon Entrée</label>
                    <input type="text" class="form-control" placeholder="Ref Bon Sortie"
                    value="{{ $bon->ref }}" name="ref">
                </div>

                <div class="col-md-4">
                    <label for="exampleInputEmail1">vendeur</label>
                    <select name="vendeur_id" class="form-control">
                    <option value="{{ $bon->vendeur_id }}">{{ $bon->vendeur->nom }}</option>
                        @foreach ($vendeurs as $vendeur)
                            <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control"
                    value="{{ $bon->date_ }}" name="date_">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="exampleInputEmail1">M.versement</label>
                    <input type="number" class="form-control" placeholder="M.versement"
                    value="{{ $bon->montant_versement }}" name="montant_versement">
                </div>


                <div class="col-md-4">
                    <label for="exampleInputEmail1">Credit sortie</label>
                    <input type="number" class="form-control" placeholder="credit sortie"
                    value="{{ $bon->cradit_sortie }}" name="cradit_sortie">
                </div>

                <div class="col-md-4">
                    <label for="exampleInputEmail1">Credit entrer</label>
                    <input type="number" class="form-control" placeholder="credit entrer"
                    value="{{ $bon->cradit_entree }}" name="cradit_entree">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12">
                        <button type="submit" class="btn btn-info btn-block">
                                Enregistrer    <i class="fas fa-save"></i>
                        </button>
                </div>
            </div>


        </form>
       </div>



@endsection
