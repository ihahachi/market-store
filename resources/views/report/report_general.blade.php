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
   
     

</div>
@endsection
