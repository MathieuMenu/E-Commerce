@extends('layouts.app')

@section('content')

    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('home5')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Index</h4>
                </a>
                <a href="{{route('home6')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Produits</h4>
                </a>
                <a href="{{route('home13')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Clients</h4>
                </a>

                <form action="" method="post">
                    <input type="hidden" value="livrer" name="action" id="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="DESC" name="tri" id="tri">
                    <button type="submit">A livré</button>
                </form>

                <form action="" method="post">
                    <input type="hidden" value="livrer" name="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="ASC" name="tri">
                    <button type="submit">Livré</button>
                </form>

                <form action="" method="post">
                    <input type="hidden" value="datecommande" name="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="ASC" name="tri">
                    <button type="submit">Date croissante</button>
                </form>

                <form action="" method="post">
                    <input type="hidden" value="datecommande" name="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="DESC" name="tri">
                    <button type="submit">Date décroissante</button>
                </form>

                <form action="" method="post">
                    <input type="hidden" value="nom" name="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="ASC" name="tri">
                    <button type="submit">Nom client croissant</button>
                </form>

                <form action="" method="post">
                    <input type="hidden" value="nom" name="action">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" value="DESC" name="tri">
                    <button type="submit">Nom client décroissant</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p></p>
                        Liste des commandes :
                        <p></p>

                        <div class="col-md-12">
                            <?php foreach($commandes as $commande){
                            ?>
                            <?= "Client = Nom : ".$commande->nom; ?><?= " / "?><?= "Prenom : ".$commande->prenom; ?><?= " / "?><?= "Email : ".$commande->email; ?><br>
                            <?= "DateCommande : ".$commande->datecommande; ?><?= " / "?><?= "Montant : ".$commande->montant; ?><?= "€ / "?><?php if($commande->livrer == 0){ echo 'Livré : Non'; }else{ echo "Livré : Oui";} ?>
                            <p>&nbsp;</p>
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

