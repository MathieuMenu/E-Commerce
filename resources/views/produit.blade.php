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
                        {{--Liste des produits :--}}
                        <p></p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
