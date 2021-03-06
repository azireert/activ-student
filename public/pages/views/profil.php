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
    <?php include('shared/navbar.php');
    include('../Controller/is_admin.php');?>

    <div class="container-fluid banner">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <h1 class="bannerTitle"><strong>Profil</strong></h1>
            </div>
        </div>
    </div>


    
    <div class="container cardProfil">
        <div class="row">
            <!--<div class="col-md-3"></div>-->
            <div class="col-md-3 cardLeft text-center">

    <?php
    $reponse = $conn->query('SELECT * FROM utilisateur, image WHERE utilisateur .id = image .id_user AND utilisateur .id = \'' . $_SESSION['id'] . '\'');
    if ($donnees = $reponse->fetch()){
    ?>

                <img class="img-fluid photoProfil" src="../../assets/uploads/<?php echo $donnees['nom']; ?>" alt="Card image cap">

    <?php

    }

        $reponse = $conn->query('SELECT * FROM utilisateur WHERE utilisateur .id = \'' . $_SESSION['id'] . '\'');

        if ($donnees = $reponse->fetch()){

    ?>
                <h1 class="card-title"><?php echo $donnees['prenom']," ",$donnees['nom']; ?></h1>
            </div>
            <div class="col-md-3 cardRight text-center">
                <p class="title"><span><i class="fa fa-envelope"></i></span><?php echo $donnees['mail']; ?></p>
                <p class="title"><span><i class="fa fa-phone"></i></span><?php echo $donnees['tel']; ?></p>
                    <p class="title"><span><i class="fa fa-briefcase"></i></span><?php echo $donnees['promo']; ?></p>
                    <p class="title"><span><i class="fa fa-leaf"></i></span><?php echo $donnees['age']; ?> ans</p>

    <?php
    	$reponse = $conn->query('SELECT permis FROM utilisateur WHERE utilisateur .id = \'' . $_SESSION['id'] . '\' AND utilisateur .permis = 1');

    	if ($donnees = $reponse->fetch()){
    ?>

                    <p class="title"><span><i class="fa fa-road"></i></span>Permis : Oui</p>
                    


    <?php
    	$reponse = $conn->query('SELECT bde FROM utilisateur WHERE utilisateur .id = \'' . $_SESSION['id'] . '\' AND utilisateur .bde = 1');

    	if ($donnees = $reponse->fetch()){

    ?>
                    <p class="title">Membre du BDE</p>

    <?php }
    	$reponse = $conn->query('SELECT admin FROM utilisateur WHERE utilisateur .id = \'' . $_SESSION['id'] . '\' AND utilisateur .admin = 1');

        $post = $conn->query('SELECT * FROM utilisateur, actu WHERE utilisateur .id = \'' . $_SESSION['id'] . '\' AND utilisateur .id = actu .auteur');
        
        
        // Test du rang admin
    	if ($donnees = $reponse->fetch()){


    ?>
                    <p class="title">Admin</p>

    <?php
    	
    	}
    	}
    }

    $reponse->closeCursor();
    ?>
    
    <p class = "edit" ><a href="edit_profil.php"><i class="fa fa-pencil"></i></a></p>

                </div>
            <div class="col-md-3"></div>

            <!-- Espace Admin -->
        <?php if ($admin == 1){ ?>
            <div class="col-md-3 cardRight text-center">
                <h5> Espace Administrateur </h5></br>
                <form action="account.php" method="post"> 
                    <div class="form-group"><button class="btn btn-primary" type="submit" name="compte"> Créer un compte </button></div>
                </form>
                <form action="listeUser.php" method="post">   
                    <div class="form-group"><button class="btn btn-primary" type="submit" name="updateCompte"> Editer un compte </button></div>
                </form>
            </div>
            <!-- Fin espace Admin -->
        <?php } else { ?>

            <div class="col-md-3 cardRight text-center" style="overflow:scroll;">
                <h5> Voici vos 3 dernier postes : </h5></br>

            <?php while ($post2 = $post->fetch()){ ?>
            
                <div><strong>Poste :</strong> <?php echo $post2['description']; ?></div><br />

        <?php } } ?>
                
            </div>

            </div>
        </div>


    <?php

    $reponse->closeCursor();

    ?>

<footer>
    <?php include ("shared/footer.php") ?>
</footer>



</body>



</html>