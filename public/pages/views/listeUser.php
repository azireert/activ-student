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
    <div class="container-fluid banner">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <h1 class="bannerTitle"><strong>Utilisateurs</strong></h1>
            </div>
        </div>
    </div>


        <div class="container cardProfil">
            <div class="row">

    <?php 
    // Récupération de la liste de tout les utilisateurs
    $listeUser = $conn->prepare("SELECT utilisateur.id as id ,utilisateur.nom , prenom , permis , bde ,admin ,mail , tel , age , promo FROM utilisateur");
    $listeUser->execute();

    $array = array();

    // Affichage des utilisateurs
    while ($listeUserF = $listeUser->fetch()){
        $permis = "Oui";
        $bde = "Oui";
        $admin = "Oui";

        if ($listeUserF['permis'] == 0){
            $permis = "Non";
        }
        if ($listeUserF['bde'] == 0){
            $permis = "Non";
        }
        if ($listeUserF['admin'] == 0){
            $permis = "Non";
        }
        ?>


            <div class="col-md-3 cardLeftAdmin text-center">
                <img class="img-fluid photoProfil" src="../../assets/uploads/default.jpg" alt="Card image cap">
                <h1 class="card-title"><?php echo $listeUserF['prenom']; ?></h1>
            </div>
            <div class="col-md-3 cardRightAdmin text-center">
                <p class="title"><span><i class="fa fa-envelope"></i></span><?php echo $listeUserF['mail']; ?></p>
                <p class="title"><span><i class="fa fa-phone"></i></span><?php echo $listeUserF['tel']; ?></p>
                <p class="title"><span><i class="fa fa-briefcase"></i></span><?php echo $listeUserF['promo']; ?></p>
                <p class="title"><span><i class="fa fa-leaf"></i></span><?php echo $listeUserF['age']; ?> ans</p>

                <p class="title"><span><i class="fa fa-road"></i></span>Permis : <?php echo $permis; ?></p>
                <p class="title">Membre du BDE : <?php echo $bde; ?></p>
                <p class="title">Admin : <?php echo $admin; ?></p>
                <form action="adminEditUser.php" method="post">
                <div class="form-group"><button class="btn btn-default editButton" value="<?php echo $listeUserF['id']?>" type="submit" name="update"><span class="iconEdit"><i class="fa fa-pencil"></i></span></button></div>
                </form>

                <form action="../Controller/deleteUser.php" method="post">
                <div class="form-group"><button class="btn btn-default editButton" value=" <?php echo $listeUserF['id']?>" type="submit" name="delete"><span class="iconEdit"><i class="fa fa-remove"></i></span></button></div>
                </form>
            </div>



        <?php
    };
    ?>

        </div>
    </div>
    </form>
        
        <!-- Suppression d'utilisateur (bouton) -->





    <?php include('shared/footer.php'); ?>
</body>
</html>