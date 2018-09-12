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

    while ($listeUserF = $listeUser->fetch()){
        echo $listeUserF['mail'] . "</br>";
    };
    ?>

    <?php include('shared/footer.php'); ?>
</body>
</html>