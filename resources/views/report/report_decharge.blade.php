<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <small><b>Date de :</b> {{ $from }} <b>à</b>  {{ $to }}</small>
                </div>
            </div>

            
            <br>
            <br>
            <br>
            <div class="row align-items-start">
                <h6 class="titre"><b>Rapport de décharges</b></h6>
            </div>


            
            <br>
            <br>



            <div class="row align-items-start">
           <!-- DataTables Example -->
                <div class="col">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Vendeur</th>
                            <th>Décharge</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dech as $de)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $de->vendeur }}</td>
                                <td>{{ $de->decharges }}</td>
                                <td>{{ $de->montant }} DA</td>
                               
                            </tr>
                        @endforeach
                        <tr>
                            <td>#</td>
                            <td></td>
                            <td>
                                <strong>
                                    TOTAL : 
                                </strong>
                            </td>
                            <td>
                                <strong>
                                {{number_format($dech->sum('montant'),2)}} DA
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>








<br>
<br>
<br>








    </div>



</body>
</html>
