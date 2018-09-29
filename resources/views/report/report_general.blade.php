@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>
         <li class="breadcrumb-item active">Rapport général</li>
    </ol>

    <!-- Page Content -->
 
    <h5>Rapport d'activité générale : </h5>
    <div class="row" style="margin-left: 0px;">
    
    <form action="{{ url('report_general') }}" method="post">
    @csrf
        <div class="form-row">
            <div class="col">           
            <input type="date" class="form-control"  name="date_a">
            </div>
            <div class="col">
            <input type="date" class="form-control" name="date_b">
            </div>
            <div class="col">
                    <select name="vendeur_id" class="form-control">
                    <option value="all">Tous les vendeurs</option>
                        @foreach ($vendeurs as $vendeur)
                            <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                        @endforeach
                    </select>
                </div>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-print"></i>
            </button>
        </div>
    </form>
   </div>
    <br>
       <h5>Rapport de décharges : </h5>
    <div class="row" style="margin-left: 0px;">
    
    <form action="{{ url('report_decharge') }}" method="post">
    @csrf
        <div class="form-row">
                <div class="col">           
                    <input type="date" class="form-control"  name="date_a">
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="date_b">
                </div>
            <div class="col">           
                <select name="report_decharge" class="form-control">
                    <option value="all">Tous les décharges</option>
                    <option value="Ftoure">Ftoure</option>
                    <option value="Gasoil">Gasoil</option>
                    <option value="Service maintenance">Service maintenance</option>
                    <option value="Promotion">Promotion</option>
                    <option value="Décharge">Décharge</option>
                    <option value="Clarque">Clarque</option>
                    <option value="Avance">Avance</option>
                    <option value="Perdu">Perdu</option>
                </select>
            </div>
            <div class="col">
                    <select name="report_vendeur" class="form-control">
                    <option value="all">Tous les vendeurs</option>
                        @foreach ($vendeurs as $vendeur)
                            <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                        @endforeach
                    </select>
                </div>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-print"></i>
            </button>
        </div>
    </form>
   </div>
   
     

</div>
@endsection
