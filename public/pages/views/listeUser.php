<?php 
session_start();
include('shared/bdd.php');
// Vérification du statut d'administrateur
include('../Controller/is_admin.php');
if($admin != 1 or !$_SESSION['id']){
    header("location: ../../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include('shared/head.php'); ?>
</head>

<body>
    <?php include('shared/navbar.php'); ?>

    <?php 
    // Récupération de la liste de tout les utilisateurs
    $listeUser = $conn->prepare("SELECT * FROM utilisateur");
    $listeUser->execute();

    // Affichage des utilisateurs
    while ($listeUserF = $listeUser->fetch()){
        echo $listeUserF['mail'] . "</br>";
        echo $listeUserF['nom'] . "</br>";
        echo $listeUserF['prenom'] . "</br>";
        echo $listeUserF['bde'] . "</br>";
        echo $listeUserF['admin'] . "</br>";
        echo $listeUserF['tel'] . "</br>";
        echo $listeUserF['permis'] . "</br>";
        echo "</br>";
    };
    ?>

    <?php include('shared/footer.php'); ?>
</body>
</html>