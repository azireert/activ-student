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