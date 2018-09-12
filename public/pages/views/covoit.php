<!DOCTYPE html>
<?php include('shared/bdd.php'); ?>
<html>

<head>
    <?php include('shared/head.php'); ?>
</head> 

<body>
	<?php include('shared/navbar.php'); ?>


    <?php // Requête lire les covoit
    $covoit = $conn->prepare("SELECT * FROM covoit, utilisateur WHERE covoit.auteur = utilisateur.id ORDER BY date desc");
    $covoit->execute();

    //Affichage des données
    while($covoitF = $covoit->fetch()){
        echo $covoitF['date'] . " === " . $covoitF['description'] . " === " . $covoitF['nom'] . " === Depart: " . $covoitF['depart'] . " === Arrivé: " . $covoitF['arrivee'] ;
        echo  "</br>";
    }

    ?>

    <?php include('shared/footer.php'); ?>
</body>

</html>