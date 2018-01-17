<?php
$t=0;
$v=0;
$T=[];
foreach($_POST['quantite'] as $q){
     $T[$t]=$q;
     $t=$t+1;
}
?>

<html>
    <body>
        <p>Bonjour <?= $_POST['nom']?> <?= $_POST['prenom'] ?></p>
        <p>Votre commande à bien été prise en compte et sera traité dans les meilleurs délais.</p>
        <p>Pour rappel votre commande est à hauteur de  : <?= $_POST['total'] ?>€</p>
        <p>Voici la liste de vos articles commandés</p>
        <?php for($i=1;$i<=$_POST['nbiteration'];$i++)
        {
            $sum=$_POST['prixproduits'.$i]*$T[$v];
            echo "Article ".$i." : ".$_POST['nomproduits'.$i]. " / Prix unitaire : ".$_POST['prixproduits'.$i]."€/u / Quantité : ".$T[$v]." Montant pour les articles : ".$sum."€";
            echo '<p></p>';
            $v=$v+1;
        }
        ?>
    </body>
</html>

<?php

?>