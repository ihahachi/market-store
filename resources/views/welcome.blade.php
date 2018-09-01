@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Accueil</a>
    </li>

    </ol>

    <!-- Page Content -->
    <h1>{{ config('constants.nom' )}}</h1>
    <hr>
      <!-- Icon Cards-->
      <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                        <i class="fas fa-users"></i>
                  </div>
                  <div class="mr-5">Bon Sortie : <strong>{{ $bs }}</strong></div>
                </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ url('bs_sortie') }}">
                  <span class="float-left">Détails</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><small>Bon Entrer : {{ $be->count() }}</small></div>
                  <hr>
                  <div class="mr-5"><small>Versement : {{ $be->sum('montant_versement') }} DA</small></div>
                  <div class="mr-5"><small>Credit Entr : {{ $be->sum('cradit_entree') }} DA</small></div>
                  <div class="mr-5"><small>Caisse : {{ $be->sum('cradit_entree') + $be->sum('montant_versement') }} DA</small></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('be_entre') }}">
                  <span class="float-left">Détails</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">123 New Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">produits en rupture : <strong>{{ $articles }}</strong></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('articles')}}">
                  <span class="float-left">Détails</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

</div>
@endsection
