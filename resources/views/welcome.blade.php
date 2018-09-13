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

    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('report')}} ">Rapport aujourd'hui</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('report/yesterday')}} ">Rapport d'hier</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('report/week')}} ">Rapport de la semaine</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('report/month')}} ">Rapport du mois</a>
    </li>


    </ol>
    
    <hr>
      <!-- Icon Cards-->
      <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-upload"></i>
                  </div>
                  <div class="mr-5"><small>Bon Sortie : {{ $bs->count() }}</small></div>
                  <hr>
                  @foreach ( $bs as $b )
                    <div class="mr-5">
                      <a class="text-light" href="{{ url('bs_sortie/' . $b->id ) }}">
                        <small>{{ $b->vendeur->nom }} | {{ $b->sumPrice($b->id) }} DA</small>
                      </a>
                    </div>
                  @endforeach
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
                    <i class="fas fa-download"></i>
                  </div>
                  <div class="mr-5"><small>bon Entrer : {{ $be->count() }}</small></div>
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
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">
                    <small>
                            Ftoure : {{ $dech->where('nom','Ftoure')->sum('montant') }} DA
                    </small><br>
                    <small>
                        Gasoil : {{ $dech->where('nom','Gasoil')->sum('montant') }} DA
                    </small><br>
                    <small>
                            Promotion : {{ $dech->where('nom','Promotion')->sum('Promotion') }} DA
                    </small><br>
                    <small>
                    S. Maintenance : {{ $dech->where('nom','Service maintenance')->sum('montant') }} DA
                    </small><br>
                    <small>
                            Décharge : {{ $dech->where('nom','Décharge')->sum('montant') }} DA
                    </small><br>
                    <small>
                            Clarque : {{ $dech->where('nom','Clarque')->sum('montant') }} DA
                    </small><br>
                    <small>
                            Avance : {{ $dech->where('nom','Avance')->sum('montant') }} DA
                    </small><br>
                    <small>
                            Perdu : {{ $dech->where('nom','Perdu')->sum('montant') }} DA
                    </small><br>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Décharge complète : {{ $dech->sum('montant') }} DA</span>

                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-box-open"></i>
                  </div>
                       <div class="mr-5">
                        <small>Produits en rupture : {{ $articles }}</small>
                      </div>
                  <hr>
                  <div class="mr-5">
                    <a class="text-white" href="{{ url('stocks/perdu') }}">
                        <small>Stock Perdu :
                          {{ $stk->where('type','PERDU')->count() }}
                        </small>
                    </a>
                   </div>
                   <div class="mr-5">
                    <a class="text-white" href="{{ url('stocks/out') }}">
                        <small>Stock Sortie :
                          {{ $stk->where('type','OUT')->count() }}
                        </small>
                    </a>
                   </div>
                   <div class="mr-5">
                    <a class="text-white" href="{{ url('stocks/in') }}">
                        <small>Stock Entrer :
                          {{ $stk->where('type','IN')->count() }}
                        </small>
                    </a>
                   </div>
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
<canvas id="myChart" width="400" height="150"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

</div>
@endsection
