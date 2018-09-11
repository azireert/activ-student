<?php
session_start();
include('shared/bdd.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('shared/head.php'); ?>
</head> 

<body>

	<?php include('shared/navbar.php'); ?>

	<?php


        $reponse = $conn->query('SELECT * FROM utilisateur WHERE utilisateur .id = 1');

        if ($donnees = $reponse->fetch()){

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card text-center">
                <img class="img-fluid" src="../../assets/Images/profil.png" alt="Card image cap">
                <h1 class="card-title"><?php echo $donnees['prenom']," ",$donnees['nom']; ?></h1>
            <div class="card-body">
                <i class="fa fa-envelope"></i><p class="title"><?php echo $donnees['mail']; ?></p>
                <i class="fa fa-phone"></i><p class="title"><?php echo $donnees['tel']; ?></p>
                    <p class="title"><?php echo $donnees['promo']; ?></p>
                    <p class="title"><?php echo $donnees['age']; ?></p>

    <?php
    	$reponse = $conn->query('SELECT permis FROM utilisateur WHERE utilisateur .id = 2 AND utilisateur .permis = 1');

    	if ($donnees = $reponse->fetch()){
    ?>

                    <p class="title">Permis : Oui</p>


    <?php
    	$reponse = $conn->query('SELECT bde FROM utilisateur WHERE utilisateur .id = 1 AND utilisateur .bde = 1');

    	if ($donnees = $reponse->fetch()){

    ?>
                    <p class="title">Membre du BDE</p>

    <?php
    	$reponse = $conn->query('SELECT admin FROM utilisateur WHERE utilisateur .id = 1 AND utilisateur .admin = 1');

    	if ($donnees = $reponse->fetch()){

    ?>
                    <p class="title">Admin</p>

    <?php
    	}
    	}
    	}
    }

    $reponse->closeCursor();

    ?>

    <a href="edit_profil.php"><i class="fa fa-pencil"></i></a>


    <?php


        $reponse = $conn->query('SELECT * FROM utilisateur, image WHERE utilisateur .id = image .id_user AND utilisateur .id = 1');

        if ($donnees = $reponse->fetch()){

    ?>


                </div>
            </div>
        </div>
    </div>

    <?php
    }

    $reponse->closeCursor();

    ?>



</body>



</html>