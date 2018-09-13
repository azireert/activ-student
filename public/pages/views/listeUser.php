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

    $array = array();

    // Affichage des utilisateurs
    while ($listeUserF = $listeUser->fetch()){
        echo $listeUserF['mail'] . "</br>";
        echo $listeUserF['nom'] . "</br>";
        echo $listeUserF['prenom'] . "</br>";
        echo $listeUserF['bde'] . "</br>";
        echo $listeUserF['admin'] . "</br>";
        echo $listeUserF['tel'] . "</br>";
        echo $listeUserF['permis'] . "</br>";
        ?>

        
        <!-- Suppression d'utilisateur (bouton) -->
        <form action="../Controller/deleteUser.php" method="post">
        <div class="form-group"><button class="btn btn-primary" value= <?php echo $listeUserF['id']?> type="submit" name="delete"> Supprimer ce compte </button></div>
            
        </form>
        <form action="adminEditUser.php" method="post">
            <div class="form-group"><button class="btn btn-primary" value= <?php echo $listeUserF['id']?> type="submit" name="update"> Modifier ce compte </button></div>
            
        </form>
        <?php
        echo "</br>";
    };
    ?>

    <?php include('shared/footer.php'); ?>
</body>
</html>