<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Panier</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font: 1em/1.5 Verdana,sans-serif;
            background: #fff;
        }
        #main {
            margin: 0 auto;
            max-width: 60em;
            border-top: 1px solid transparent;
        }
        h1, h2, h3 {
            color: #069;
        }
        #facture {
            display: table;
        }
        #facture p {
            display: table-row;
            line-height: 2em;
        }
        #facture p span {
            display: table-cell;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            border-left: 1px solid #ccc;
            text-align: center;
            line-height: 3em;
        }
        #facture p > span +span {
            border-left: 0 solid #ccc;
        }
        #facture p.entete {
            text-shadow: 1px 1px 0 #fff;
            background: #eee;
            background: linear-gradient(to bottom,transparent,rgba(0,0,0,0.2) ) repeat scroll 0 0 #EEE;
        }
        #facture .entete span {
            border-top: 1px solid #ccc;
        }
        #facture input,
        #facture select,
        #facture button {
            font-family: Verdana;
            font-size: .9em;
            line-height: 1.5em;
        }
        #facture select {
            width: 11em;
        }
        #facture select option:first-child {
            font-style: italic;
            color: #888;
        }
        #facture button {
            width: 2em;
        }
        #facture [name ^=quantite] {
            width: 2em;
        }
        .col_1 {
            min-width: 13em;
        }
        .col_2 {
            min-width: 4em;
        }
        .col_3 {
            min-width: 8em;
        }
        .col_4 {
            min-width: 10em;
        }
        #facture .info-prix {
            font-size: .8em;
            font-style: italic;
        }
        #facture .text-right {
            padding-right: .5em;
            text-align: right;
        }
        #total:after,
        .info-prix:after,
        .total-ligne:after {
            content: " €";
        }
        .header{
            background-color: #9d9d9d;
            padding:25px 0px 25px 70px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

<div class="header">
    <div style="color:white;text-align: left;font-size:25px;font-weight: bold;">
        <p>E-commerce</p>
    </div>
</div>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-4">
            <h4>Panier</h4>
            <a href="./">Index</a>
        </div>
        <div class="col-md-8">
            <?php if($message != null){
                echo '<p>'.$message.'</p>';
            }
            ?>
            <form action="" method="post">
            <div id="main">
                <div id="facture">
                    <p class="entete">
                        <span class="col_1">Désignation</span>
                        <span class="col_2">Prix U</span>
                        <span class="col_3">Quantité</span>
                        <span class="col_4">Prix total</span>
                    </p>

                    <?php
                    if($panier != null){
                        foreach($panier as $P){
                            foreach($P as $Produit){

                                ?>
                    <p class="ligne">
                    <span class="col_1">
                      <select name="prix[]">
                        <option value="<?= $Produit->prix;?>"><?= $Produit->designation;?></option>
                      </select>
                    </span>
                        <span class="col_2 info-prix"></span>
                        <span class="col_3">
                      {{--<button class="btn_moins">-</button>--}}
                      <input  name="quantite[]">
                      {{--<button class="btn_plus">+</button>--}}
                    </span>
                        <span class="col_4 total-ligne text-right"></span>
                    </p>

                    <?php
                    }
                    }
                    }
                    ?>

                    <p>
                        <span></span>
                        <span></span>
                        <span>Total :</span>
                        <span id="total" name="total" class="text-right">€</span>


                    </p>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 50px;">

                    <p>Veuillez remplir le formulaire suivant pour valider votre panier</p>
                    <p>Nom : <input type="text" id="nom" name="nom"  /></p>
                    <p>Prenom : <input type="text" id="prenom" name="prenom"  /></p>
                    <p>Email : <input type="email" id="email" name="email"  /></p>
                    <p>Montant : <input type="number" id="total2" name="total" readonly="true" /></p>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <?php
                    $i=0;
                    if($panier != null){
                    foreach($panier as $P){
                    foreach($P as $Produit){
                    $i=$i+1;
                    ?>
                    <input type="hidden" value="<?= $Produit->designation; ?>" name="nomproduits<?= $i ?>">
                    <input type="hidden" value="<?= $Produit->prix; ?>" name="prixproduits<?= $i ?>">
                    <?php
                    }
                    }
                    }
                    ?>
                    <input type="hidden" value="<?= $i ?>" name="nbiteration">


                    <p style="padding-top: 20px;"><input type="submit" /></p>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
<script>
    function calculTotal(){
        var total = 0;
        // récup. des champs de contrôle
        var oParent = document.getElementById('facture');
        var oTotaux = oParent.querySelectorAll('.total-ligne');

        var i, nb = oTotaux.length;
        // calcul super total
        for( i = 0 ; i < nb; i += 1){
            total += parseFloat( oTotaux[i].textContent);
        }
        // affectation de la valeur
        document.getElementById('total').textContent = total.toFixed(2);
        document.getElementById('total2').setAttribute("value", total);
    }
    function recupqt(quantite){
        $.ajax({
            url : 'mail.blade.php',
            type : 'POST', // Le type de la requête HTTP, ici devenu POST
            data : 'quantite=' + quantite, // On fait passer nos variables, exactement comme en GET, au script more_com.php
            dataType : 'html'
        });
    }
    /**
     * Calcul suivant les éléments de la ligne et met à jour les champs d'affichage
     * @param {Object} parent - conteneur de la ligne de calcul
     */
    function calculLigne( parent){
        // récup. des champs de contrôle
        var oPrix        = parent.querySelector('[name ^=prix]');
        var oQuantite    = parent.querySelector('[name ^=quant]');
        var oTxtPrix     = parent.querySelector('.info-prix');
        var oTxtTotal    = parent.querySelector('.total-ligne');
        // récup. et calcul des valeurs
        var prixUnitaire = parseFloat( oPrix.value) || 0;
        var quantite     = parseFloat( oQuantite.value) || 0;

        var total        = prixUnitaire * quantite;
        // affectation des valeurs
        oTxtPrix.textContent  = prixUnitaire.toFixed(2);
        oTxtTotal.textContent = total.toFixed(2);
        // demande mise à jour total
        calculTotal();
    }
    /**
     * Met à jour le champ quantité et demande le calcul sur la ligne
     * @param {Object} parent - conteneur de la ligne de calcul
     * @param {Number} inc - incrément à appliquer : +1, 0, -1
     */
    function majQuantite( parent, inc){
        var oElem = parent.querySelector('[name ^=quant]');
        var val   = parseInt( oElem.value || 0, 10) +inc;
        // test aux bornes
        if( val < 0){
            val = 0;
        }
        if( val > 100){
            val = 100;
        }
        // affectaion valeur
        oElem.value = val;
        // force le recalcul de la ligne
        calculLigne( parent);
    }
    /**
     * Affectation des événements sur les contrôles de la ligne
     * @param {Object} parent - conteneur de la ligne de calcul
     */
    function addEventLigne( parent){
        // récup. <select>
        var oElem = parent.querySelector('[name ^=prix]');
        oElem.onchange = function(){
            calculLigne( parent);
        };
        // récup. des <button>
//        oElem = parent.querySelector('.btn_plus');
//        oElem.onclick = function(){
//            majQuantite( parent, 1);
//        };
//        oElem = parent.querySelector('.btn_moins');
//        oElem.onclick = function(){
//            majQuantite( parent, -1);
//        };
        // récup. <input> quantité
        oElem = parent.querySelector('[name ^=quant]');
        oElem.onkeyup = function(){
            if( !isNaN( parseInt( this.value, 10))){
                majQuantite( parent, 0);
            }
            else{
                this.value = 0;
            }
        };
        // mise à jour des champs
        calculLigne( parent);
    }
    // initialisation
    var oElems = document.querySelectorAll('P.ligne'),
        i, nb = oElems.length;
    for( i = 0 ; i < nb; i += 1){
        addEventLigne( oElems[i]);
    }
</script>
</body>
</html>