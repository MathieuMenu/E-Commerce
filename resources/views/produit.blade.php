@extends('layouts.app')

@section('content')

    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('home5')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Index</h4>
                </a>
                <a href="" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Clients</h4>
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

                            <form action="{{route('home7')}}">
                            <button type="submit">AJOUTER UN PRODUIT</button>
                            </form>

                        <p></p>
                        Liste des produits :
                        <p></p>

                        <div class="col-md-12">
                            <?php foreach($produits as $produit){
                            ?>
                            <?= "Id : ".$produit->id; ?><br>
                            <?= "Prix : ".$produit->prix; ?><?= "€ / "?><?= "Designation : ".$produit->designation; ?><?= " / "?><?= "Description : ".$produit->description; ?><?= " / "?><?= "Nb_dispo : ".$produit->nb_disponible; ?><br>
                            <form action="{{route('home9')}}" method="post">
                                <input type="hidden" value="<?= $produit->id; ?>" id="id" name="id">
                                <button type="submit" style="float: left;">Modifier ce produit</button>
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </form>
                            <form action="{{route('home12')}}" method="post">
                                <input type="hidden" value="<?= $produit->id; ?>" id="id" name="id">
                                <button type="submit">Supprimer ce produit</button>
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </form>
                            <p></p>
                            <?php } ?>
                        </div>
                        <div class="text-center col-sm-10">
                            <?= $produits->links(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
