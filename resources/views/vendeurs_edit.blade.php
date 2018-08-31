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
        <a href="{{ url('/ls_vendeurs') }}">Liste des vendeurs</a>
    </li>

    <li class="breadcrumb-item active">Modification vendeur : {{ $vendeur->nom }} </li>
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

    <form action="{{ url('/ls_vendeurs/'. $vendeur->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    @csrf
        <div class="form-row">
            <div class="col">
            <input type="text" class="form-control" placeholder="Nom de vendeur" value="{{ $vendeur->nom }}" name="nom">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Tele" value="{{ $vendeur->tel }}" name="tel">
            </div>
            <button type="submit" class="btn btn-info">
                    <i class="fas fa-save"></i>
            </button>
        </div>
    </form>
   </div>
   <br>


</div>
@endsection
