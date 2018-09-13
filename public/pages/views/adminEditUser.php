<?php
session_start();
include('shared/bdd.php');
include('../Controller/is_admin.php');
include('../Controller/is_bde.php');
if (!$_SESSION['id'] or $admin != 1){
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
	<?php include('shared/banner.php'); ?>

        // Requête pour récupérer les informations de l'utilisateur à modifier
        $reponse = $conn->query('SELECT * FROM utilisateur WHERE id = \'' . $_POST['update'] . '\'');

        if ($donnees = $reponse->fetch()){

    ?>
    <form  method="post" action ="../Controller/adminEditProfil.php" data-bs-hover-animate="pulse" style="padding-left: 10px;padding-right: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 formEdit">
                    <!-- Modification nom prenom -->
                    <div class="form-group"><label><strong>Nom</strong></label><input class="form-control" type="varchar" name="nom" value="<?php echo $donnees['nom'] ?>" ></div>
                    <div class="form-group"><label><strong>prenom</strong></label><input class="form-control" type="varchar" name="prenom" value="<?php echo $donnees['prenom'] ?>"></div>
                    <div class="form-group">
                        <label><strong>Promotion</strong></label>
                        <select class="custom-select mr-sm-2" name="promo" id="inlineFormCustomSelect">
                            <option value="<?php echo $donnees['promo'] ?>" selected><?php echo $donnees['promo'] ?></option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="I4">I4</option>
                            <option value="I5">I5</option>
                        </select></div>

                    <!-- Modification BDE -->
                    <div class="form-group">
                        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bde" id="inlineRadio1" value="1" <?php if($Bde == 1){ ?>checked <?php }; ?>>
                            <label class="form-check-label" for="inlineRadio1">Membre du BDE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bde" id="inlineRadio2" value="0" <?php if($Bde == 0){ ?>checked <?php }; ?> >
                            <label class="form-check-label" for="inlineRadio2">Non membre du BDE</label>
                        </div>
                    </div>

                    <!-- Modification Admin -->
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="admin" id="inlineRadio1" value="1" <?php if($admin == 1){ ?>checked <?php }; ?>>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="admin" id="inlineRadio2" value="0" <?php if($admin == 0){ ?>checked <?php }; ?>>
                            <label class="form-check-label" for="inlineRadio2">Non Admin</label>
                        </div>
                    </div>


                    <div class="form-group"><button class="btn btn-primary" value= <?php echo $_POST['update']; ?> type="submit" name="submit" style="padding-left:50px;padding-right:50px;font-size: 15px;">Modifier le profil</button></div><br /><br />
                </div>
            </div>
    </div>
    </form>
            <?php
                                            
        }

        $reponse->closeCursor();

    ?>



</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>