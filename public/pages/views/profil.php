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
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=activestudent;charset=utf8', 'root', '');
        }
            catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM utilisateur WHERE utilisateur .id = 1');

        if ($donnees = $reponse->fetch()){

    ?>

    <strong><p>Profil :</p></strong>

    <strong>Nom : </strong><?php echo $donnees['nom']; ?><br />
    <strong>Prénom : </strong><?php echo $donnees['prenom']; ?><br />
    <strong>Téléphone : </strong><?php echo $donnees['tel']; ?><br />
    <strong>Adresse Mail : </strong><?php echo $donnees['mail']; ?><br />
    <strong>Promo : </strong><?php echo $donnees['promo']; ?><br />
    <strong>Age : </strong><?php echo $donnees['age']; ?><br />

    <?php
    	$reponse = $bdd->query('SELECT permis FROM utilisateur WHERE utilisateur .id = 2 AND utilisateur .permis = 1');

    	if ($donnees = $reponse->fetch()){
    ?>

    <strong>Permis :</strong> Oui<br />

	<a href="edit_profil.php"><p>Edit</p></a>

    <?php
    	$reponse = $bdd->query('SELECT bde FROM utilisateur WHERE utilisateur .id = 1 AND utilisateur .bde = 1');

    	if ($donnees = $reponse->fetch()){

    ?>
    <strong>Membre du BDE</strong><br />

    <?php
    	$reponse = $bdd->query('SELECT admin FROM utilisateur WHERE utilisateur .id = 1 AND utilisateur .admin = 1');

    	if ($donnees = $reponse->fetch()){

    ?>
    <strong>Admin</strong><br />

    <?php
    	}
    	}
    	}
    }

    $reponse->closeCursor();

    ?>


    <?php
    	try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=activestudent;charset=utf8', 'root', '');
    	}
    		catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM utilisateur, image WHERE utilisateur .id = image .id_user AND utilisateur .id = 1');

        if ($donnees = $reponse->fetch()){

    ?>

    <img style="max-width: 100px;max-height: 100px;border: 1px black solid;border-radius:10px;padding:2px;margin: 15px;" src="../../assets/uploads/<?php echo $donnees['nom']; ?>">

    <?php
    }

    $reponse->closeCursor();

    ?>





</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>