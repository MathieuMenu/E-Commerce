@extends('layouts.app')

@section('content')

    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('home5')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Index</h4>
                </a>
                <a href="{{route('home6')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Produits</h4>
                </a>
                <a href="" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Commandes</h4>
                </a>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p></p>
                        Liste des clients :
                        <p></p>

                        <div class="col-md-12">
                            <?php foreach($clients as $client){
                            ?>
                            <?= "Nom : ".$client->nom; ?><?= " / "?><?= "Email : ".$client->email; ?><?= " / "?><?= "MontantTotal : ".$client->montant; ?><?= " €/ "?><?= "DateDerniereCommande : ".$client->datecommande; ?><br>
                            <p></p>
                            <?php } ?>
                        </div>
                        <div class="text-center col-sm-10">
                            <?= $clients->links(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

