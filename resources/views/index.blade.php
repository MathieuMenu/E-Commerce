<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 11/01/2018
 * Time: 19:30
 */

//$produits = App\Produit::all();


?>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

    <style>
        .produit{
            background-color: #f4f4f4;
            padding: 10px 10px 10px 10px;
            box-shadow: 1px 1px 4px #555;
            margin-right:10px;
            margin-top:10px;
        }
        ul{ border:0; margin:0; padding:0; }

        .page{
            margin-top:15px;
        }

        .header{
            background-color: #9d9d9d;
            padding:25px 0px 25px 70px;
            margin-bottom: 10px;
        }

        li
        {
            border:0;
            margin:0;
            padding:0;
            font-size:11px;
            list-style:none;
        }

        .previous-off, .next-off
        {
            color:#666666;
            display:block;
            float:left;
            font-weight:bold;
            padding:3px 4px;
        }

        .next a, .previous a
        {
            font-weight:bold;
        }

        .pagination {
            display: inline-flex;
            margin: 0 auto;
        }

        .active
        {
            color:#ff0084;
            font-weight:bold;
            display:block;
            float:left;
            padding:4px 6px;
        }

        a:link, a:visited
        {
            color:#0063e3;
            display:block;
            float:left;
            padding:3px 6px;
            text-decoration:none;
        }

        form{
            padding-top:10px;
        }
    </style>

</head>
<body>

<div class="header">
    <div style="color:white;text-align: left;font-size:25px;font-weight: bold;">
        <p>E-commerce</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 panier">
            <h4>Tri</h4>

            <form action="" method="post">
                <input type="hidden" value="id" name="action" id="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="ASC" name="tri" id="tri">
                <button type="submit">Base</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="prix" name="action" id="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="ASC" name="tri" id="tri">
                <button type="submit">Prix Croissant</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="prix" name="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="DESC" name="tri">
                <button type="submit">Prix Décroissant</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="designation" name="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="ASC" name="tri">
                <button type="submit">Désignation Croissant</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="designation" name="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="DESC" name="tri">
                <button type="submit">Désignation Décroissant</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="nb_disponible" name="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="ASC" name="tri">
                <button type="submit">Stock Croissant</button>
            </form>

            <form action="" method="post">
                <input type="hidden" value="nb_disponible" name="action">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="DESC" name="tri">
                <button type="submit">Stock Décroissant</button>
            </form>

        </div>
        <div class="col-md-8">

            <div class="row">
                <?php
                foreach($produits as $produit){
                ?>
            <div class="col-md-5 produit text-center">

                <p><?=  $produit->designation;?></p>
                <p><?=  "Prix : ".$produit->prix;?>€</p>
                <p><?=  "En stock : ".$produit->nb_disponible;?></p>
                <!--<a href="#" id="addtocart">Ajouter au panier</a>-->

            </div>
                <?php
                }
                ?>
            </div>
            <div class="text-center col-sm-10">
            <?= $produits->links(); ?>
            </div>
        </div>
    </div>
</div>



</body>
</html>