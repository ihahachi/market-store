<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $bon->vendeur->nom }} : {{ $bon->ref }}</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>


<style>
    .titre{
        text-align: center;
        margin-bottom: 15px;
       
    }
    .rtl{

        text-align: right;
        align-content: flex-end

    }
    .table
    {
        font-size: 9px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: justify;
    }
    .container-fluid{
        margin: 0px;
    }

    .tete{
        font-size: 8px;
    }
   
</style>
<body>
    <div class="container-fluid">




            <h6 style="margin: 0%;"><b>{{ config('constants.nom' )}}</b></h6>
            <div class="row align-items-start tete">
                <div class="col-md-6">
                    <small><b>Tel :</b> {{ config('constants.tel' )}}</small><br>
                    <small><b>Fax :</b> {{ config('constants.fax' )}}</small><br>
                    <small><b>Address : </b>{{ config('constants.address' )}}</small>
                </div>
                <div class="col-md-6 rtl">
                    <small><b>Vendeur :</b> {{ $bon->vendeur->nom }}</small><br>
                    <small><b>Ref. BS :</b> {{ $bon->ref }}</small><br>
                    <small><b>Date :</b> {{ $bon->date_ }}</small><br>
                </div>
            </div>



            <div class="row align-items-start">
                <h6 class="titre"><b>BON SORTIE</b></h6>
            </div>
                

      
        

            <div class="row align-items-start">
           <!-- DataTables Example -->
                <div class="col">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Ref</th>
                            <th>Nom</th>
                            <th>Categorie</th>
                            <th>Marque</th>
                            <th>Quantité</th>
                            <th>Vent</th>
                            <th>P.Gros</th>
                            <th>P.Demi-G</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $bs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bs->article->ref }}</td>
                                <td>{{ $bs->article->nom }}</td>
                                <td>{{ $bs->article->categorie->nom }}</td>
                                <td>{{ $bs->article->marque->nom }}</td>
                                <td>{{ $bs->quantite }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>








    </div>



</body>
</html>
