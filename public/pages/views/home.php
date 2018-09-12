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



    
    <form  action ="../Controller/actu.php" method="post" data-bs-hover-animate="pulse">
        <div class="container-fluid postForm">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
            <div class="form-group">
                <textarea class="form-control" rows="5" cols="50" name="description" required placeholder="Exprimez vous"></textarea></div>
            <div class="form-group">
                <center><button class="btn btn-primary" type="submit" name="submit"><span class="pencilPost"><i class="fa fa-send"></i></span>Poster</button></center>
            </div>
                </div>
            </div>
        </div>
    </form>
            

	<?php

        include('../Controller/is_admin.php');

        // We retrieve the contents of many table
        $reponse = $conn->query('SELECT * FROM utilisateur, actu, image WHERE utilisateur .id = actu .auteur AND utilisateur .id = image .id_user ORDER BY actu .id DESC');

        $item = "item-1";

        while ($donnees = $reponse->fetch()){ // While I have answer ---> I display data in a loop

    ?>

    <div class="container-fluid postContent">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1 postPhoto text-center">
                <img class="photoHome" src="../../assets/uploads/<?php echo $donnees['nom']; ?>">
                <p><strong><?php echo $donnees['prenom']; ?></strong></p>
            </div>
            <div class="col-md-5 postBody">

                <p class="date"><?php echo $donnees['date']; ?></p>
                <p><?php echo $donnees['description']; ?></p>
                <?php if($admin === $_SESSION['id']) { ?>
                <span class="pull-right"><i class="fa fa-remove"></i></span>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
                            
    <?php
            
        $item++;

        }

    ?>

</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>