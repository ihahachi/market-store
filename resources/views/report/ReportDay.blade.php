<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $bon->vendeur->nom }} : {{ $bon->ref }}</title> --}}
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
                <h6 class="titre"><b>Rapport</b></h6>
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
                            <th>Montant total</th>
                            <th>Montant versement</th>
                            <th>Cradit sortie</th>
                            <th>Cradit entrée</th>
                            <th>Décharges</th>
                            <th>ECART</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bon_entre as $be)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $be->nom }}</td>
                                <td>{{ $be->montant_total }} DA</td>
                                <td>{{ $be->montant_versement }} DA</td>
                                <td>{{ $be->cradit_sortie }} DA</td>
                                <td>{{ $be->cradit_entree }} DA</td>
                                <td>{{ $be->montant }} DA</td>
                                <td>{{ $be->ecart }} DA</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>#</td>
                            <td><strong>Total</strong></td>
                            <td>
                                <strong>
                                    {{number_format($bon_entre->sum('montant_total'),2)}} DA
                                </strong>
                            </td>
                            <td>
                                <strong>
                                        {{number_format($bon_entre->sum('montant_versement'),2)}} DA
                                </strong>
                            </td>
                            <td>
                                <strong>
                                        {{number_format($bon_entre->sum('cradit_sortie'),2)}} DA
                                </strong>
                            </td>
                            <td>
                                <strong>
                                        {{number_format($bon_entre->sum('cradit_entree'),2)}} DA
                                </strong>
                            </td>
                            <td>
                                <strong>
                                        {{number_format($bon_entre->sum('montant'),2)}} DA
                                </strong>
                            </td>
                            <td>
                                <strong>
                                        {{number_format($bon_entre->sum('ecart'),2)}} DA
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
