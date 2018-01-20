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

                        <form action="" method="post">
                            <p>Veuillez remplir le formulaire pour ajouter un produit : </p>
                            <p>Designation : <input type="text" id="designation" name="designation" required="required" /></p>
                            <p>Description : <input type="text" id="description" name="description" required="required" /></p>
                            <p>Prix : <input type="number" step="0.1" id="prix" name="prix" required="required" /></p>
                            <p>Quantité dispo : <input type="number" id="quantite" name="quantite" required="required" /></p>
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <p style="padding-top: 20px;"><input type="submit" /></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
