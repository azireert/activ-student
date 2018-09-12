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

	<form  method="post" action ="../Controller/edit_profil.php" data-bs-hover-animate="pulse" style="padding-left: 10px;padding-right: 10px;">
   <?php

        $reponse = $conn->query('SELECT * FROM utilisateur WHERE id = \'' . $_SESSION['id'] . '\'');

        if ($donnees = $reponse->fetch()){

    ?>
                                                
    <div class="form-group">Téléphone :<input class="form-control" type="varchar" name="tel" value="<?php echo $donnees['tel'] ?>" ></div>
    <div class="form-group">Promo :<input class="form-control" type="varchar" name="promo" value="<?php echo $donnees['promo'] ?>"></div>
    <div class="form-group">Age :<input class="form-control" type="int" name="age" value="<?php echo $donnees['age'] ?>"></div>
    <div class="form-group">Permis :<input class="form-control" type="tinyint" name="permis" value="<?php echo $donnees['permis'] ?>"></div>
                                                
    <?php
                                            
        }

        $reponse->closeCursor();

    ?>

    <div class="form-group"><button class="btn btn-primary" type="submit" name="submit" style="padding-left:50px;padding-right:50px;font-size: 15px;">Submit</button></div><br /><br />
    </form>

</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>