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
                <small><b>Address : </b>{{ config('constants.address' )}}</small><br>
                <small><b>Date :</b> {{ $bon->date_ }}</small>
            </div>
            <div class="col-md-6 rtl">
                <small><b>Ref. BE :</b> {{ $bon->ref }}</small><br>
                <small><b>Vendeur :</b> {{ $bon->vendeur->nom }}</small><br>
                <small><b>N° Tel :</b> {{ $bon->vendeur->tel }}</small><br>         
            </div>
            </div>



            <div class="row align-items-start">
                <h6 class="titre"><b>BON ENTREE</b></h6>
            </div>
                

      
        

            <div class="row align-items-start">
           <!-- DataTables Example -->
                <div class="col">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Ref</th>
                            <th>Désignation</th>                           
                            <th>Qtn</th>
                            <th>Prix</th>
                            <th>Etat</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $bs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bs->article->ref }}</td>
                                <td>{{ $bs->article->nom }}</td>                               
                                <td>{{ $bs->quantite }}</td>                              
                                <td>{{ $bs->prix_vent }}</td>
                                <td>{{ $bs->type }}</td>                       
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row ">                      
        <div class="col-8">
            <table class="table table-bordered  table-sm">
                <thead>
                    <tr>
                        <th>Credit Entrée</th>  
                        <th>Credit Sortie</th> 
                        <th>Montant total</th> 
                        <th>Montant versement</th>
                        <th>ECART</th>                                         
                    </tr>
                </thead>
                <tbody>               
                        <tr>             
                            <td>{{ $bon->cradit_sortie }}</td> 
                            <td>{{ $bon->cradit_entree }}</td> 
                            <td>{{ $bon->montant_total }}</td>
                            <td>{{ $bon->montant_versement }}</td>
                            <td>{{ $bon->ecart }}</td>                   
                        </tr>                 
                </tbody>
            </table>
        </div>   
    </div>

    <div class="row ">
        <div class="col-10">
            <p class="text-right"><small><strong>Magazine</strong></small></p>
        </div>    
    </div>







    </div>



</body>
</html>
