@extends('layouts.app')

@section('content')

<div class="container" style="padding-bottom: 50px;">
    <div class="row">
        <div class="col-md-2">
            <a href="produit" style="text-align: left;">
                <h4 style="color:orangered !important;font-weight: bold;">Produits</h4>
            </a>
            <a href="client" style="text-align: left;">
                <h4 style="color:orangered !important;font-weight: bold;">Clients</h4>
            </a>
            <a href="commandes" style="text-align: left;">
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

                    LISTE DES COMMANDES A TRAITER :

                    <p></p>

                    <div class="col-md-12">
                        <?php foreach($commandes as $commande){
                        ?>
                        <?= "Id : ".$commande->id; ?><br>
                        <?= "Nom : ".$commande->nom; ?><?= " / "?><?= "Prenom : ".$commande->prenom; ?><?= " / "?><?= "Montant : ".$commande->montant."€"; ?><br>
                        <?= "Email : ".$commande->email; ?><?= " / "?><?= "Date commande : ".$commande->datecommande; ?>
                        <p></p>
                        <?php } ?>
                    </div>
                    <div class="text-center col-sm-10">
                        <?= $commandes->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
