<!DOCTYPE html>
<?php 
session_start();
include('shared/bdd.php'); ?>
<html>

<head>
    <?php include('shared/head.php'); ?>
</head> 

<body>
	<?php include('shared/navbar.php'); ?>
    
    <!-- Formulaire pour remplir un nouveau post en covoit -->
    <form  action ="../Controller/add_covoit.php" method="post" data-bs-hover-animate="pulse">
        <div class="container-fluid postForm">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
            <div class="form-group">
                <textarea class="form-control" type="text" rows="1" cols="50" name="depart" required placeholder="ville de depart"></textarea>
                <textarea class="form-control" type="text" rows="1" cols="50" name="arrivee" required placeholder="ville de arrivée"></textarea></div>
                <textarea class="form-control" type="text" rows="5" cols="50" name="description" required placeholder="Description"></textarea></div>
            </div>
            <div class="form-group">
                <center><button class="btn btn-primary" type="submit" name="submit"><span class="pencilPost"><i class="fa fa-send"></i></span>Poster</button></center>
            </div>
                </div>
            </div>
        </div>
    </form>


    <?php // Requête lire les covoit
    $covoit = $conn->prepare("SELECT * FROM covoit, utilisateur WHERE covoit.auteur = utilisateur.id ORDER BY date desc");
    $covoit->execute();

    //Affichage des données
    while($covoitF = $covoit->fetch()){
        echo $covoitF['date'] . " === " . $covoitF['description'] . " === " . $covoitF['nom'] . " === Depart: " . $covoitF['depart'] . " === Arrivé: " . $covoitF['arrivee'] . " === " . $covoitF['tel'] . " === ";
        echo  "</br>";
    }

    ?>

    <?php include('shared/footer.php'); ?>
</body>

</html>