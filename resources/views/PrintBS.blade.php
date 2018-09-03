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
                <small><b>Ref. BS :</b> {{ $bon->ref }}</small><br>
                <small><b>Vendeur :</b> {{ $bon->vendeur->nom }}</small><br>
                <small><b>N° Tel :</b> {{ $bon->vendeur->tel }}</small><br>         
            </div>
    </div>



    <div class="row align-items-start">
                <h6 class="titre"><b>BON SORTIE</b></h6>
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
                        <th>Prix</th>
                        <th>Retour</th>
                        <th>Perdu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $bs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bs->article->ref }}</td>
                            <td>{{ $bs->article->nom }}</td>                        
                            <td>{{ $bs->quantite }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
   <div class="row ">                      
        <div class="col-12">
            <table class="table table-bordered  table-sm">
                <thead>
                    <tr>
                        <th>Frais divers</th> 
                        <th>Frais divers</th>
                        <th>Frais divers</th>
                        <th>Frais divers</th>
                        <th>Frais divers</th>
                        <th>Frais divers</th>                                           
                    </tr>
                </thead>
                <tbody>               
                       <tr>             
                            <td>1.</td>
                            <td>2.</td>
                            <td>3.</td>                 
                            <td>4.</td>
                            <td>5.</td>
                            <td>6.</td>
                        </tr>                
                </tbody>
            </table>
        </div>   
    </div>
    <div class="row ">                      
        <div class="col-4">
            <table class="table table-bordered  table-sm">
                <thead>
                    <tr>
                        <th>Credit Entrée</th>  
                        <th>Credit Sortie</th>                                          
                    </tr>
                </thead>
                <tbody>               
                        <tr>             
                            <td>#</td> 
                            <td>#</td>                     
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
