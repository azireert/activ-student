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

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">
                <form  action ="../controller/actu.php" method="post" data-bs-hover-animate="pulse" style="border:1px silver solid;border-radius: 5px;background-color: white;padding-left: 10px;padding-right: 10px;margin-top:50px;">
                    <h2 class="text-center" style="font-size: 24px;padding:10px;">
                        <strong>Poster une actu :</strong><br />
                    </h2>
                    <div class="form-group"><textarea class="form-control" rows="10" cols="50" name="description" required placeholder="Ecriver votre message ici"></textarea></div>
                    <div class="form-group">
                        <center><button class="btn btn-primary" type="submit" name="submit" style="padding-left:50px;padding-right:50px;font-size: 15px;margin-bottom: 20px;">Poster</button></center>
                    </div>
            </div>
        </div>
    </div>

	<?php

        // We retrieve the contents of many table
        $reponse = $conn->query('SELECT * FROM utilisateur, actu, image WHERE utilisateur .id = actu .auteur AND utilisateur .id = image .id_user ORDER BY actu .id DESC');

        $item = "item-1";

        while ($donnees = $reponse->fetch()){ // While I have answer ---> I display data in a loop

    ?>

	<img src="../../assets/uploads/<?php echo $donnees['nom']; ?>">
    <p><strong><?php echo $donnees['prenom']; ?></strong></p>                

    <p><?php echo $donnees['date']; ?></p>
    <p><strong><?php echo $donnees['description']; ?></strong></p>
                            
    <?php
            
        $item++;

        }

    ?>

</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>