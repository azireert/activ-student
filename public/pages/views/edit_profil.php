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
    <?php include('shared/banner.php'); ?>


   <?php

        $reponse = $conn->query('SELECT * FROM utilisateur WHERE id = \'' . $_SESSION['id'] . '\'');

        if ($donnees = $reponse->fetch()){

    ?>
    <form  method="post" action ="../Controller/edit_profil.php" data-bs-hover-animate="pulse" style="padding-left: 10px;padding-right: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 formEdit">
                    <div class="form-group"><label><strong>Téléphone</strong></label><input class="form-control" type="varchar" name="tel" value="<?php echo $donnees['tel'] ?>" ></div>
                    <div class="form-group"><label><strong>Age</strong></label><input class="form-control" type="int" name="age" value="<?php echo $donnees['age'] ?>"></div>
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

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="permis" id="inlineRadio1" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Véhiculé</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="permis" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Non véhiculé</label>
                        </div>
                        </div>


                    <div class="form-group"><button class="btn btn-primary" type="submit" name="submit" style="padding-left:50px;padding-right:50px;font-size: 15px;">Modifier le profil</button></div><br /><br />
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