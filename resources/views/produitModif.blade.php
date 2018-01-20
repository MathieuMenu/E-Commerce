@extends('layouts.app')

@section('content')

    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('home6')}}" style="text-align: left;">
                    <h4 style="color:orangered !important;font-weight: bold;">Produits</h4>
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
                        <?php foreach($produits as $produit){
                            ?>
                        <form action="{{route('home11')}}" method="post">
                            <p>Veuillez remplir le formulaire pour ajouter un produit : </p>
                            <p>Designation : <input type="text" value ="<?= $produit->designation; ?>" id="designation" name="designation" required="required" /></p>
                            <p>Description : <input type="text" value ="<?= $produit->description; ?>" id="description" name="description" required="required" /></p>
                            <p>Prix : <input type="number" value ="<?= $produit->prix; ?>" step="0.1" id="prix" name="prix" required="required" /></p>
                            <p>Quantité dispo : <input type="number" value ="<?= $produit->nb_disponible; ?>" id="quantite" name="quantite" required="required" /></p>
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="<?= $produit->id; ?>" name="id" id="id">
                            <p style="padding-top: 20px;"><input type="submit" /></p>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
