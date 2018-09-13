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

    <div class="container-fluid bannerBde">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <center><img class="img-fluid bde" src="../../assets/Images/johnny.jpg">
                <p><strong>Président</strong></p>
                </center>
            </div>
            <div class="col-md-2">
                <center><img class="img-fluid bde" src="../../assets/Images/John-Doe.jpg">
                <p><strong>Vice-Président</strong></p></center>
            </div>
            <div class="col-md-2">
                <center><img class="img-fluid bde" src="../../assets/Images/secretaire.jpg">
                <p><strong>Secrétaire</strong></p></center>
            </div>
            <div class="col-md-2">
                <center><img class="img-fluid bde" src="../../assets/Images/bob.jpg">
                <p><strong>Trésorier</strong></p></center>
            </div>
        </div>
    </div>

    <?php include('../Controller/is_bde.php'); if($admin == 1 || $Bde == 1) { ?>

	<form  action ="../Controller/bde.php" method="post" data-bs-hover-animate="pulse">
		<div class="container-fluid postForm">
			<div class="row">
                <div class="col-md-3"></div>
			    <div class="col-md-2">
			        <div class="form-group">
                        <div class="form-group"><input class="form-control" type="date" name="date" required placeholder="Date de l'évenement"></div>
                        <div class="form-group"><input class="form-control" type="text" name="lieu" required placeholder="Lieu de l'évenement"></div>
	                    <select class="custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
	                        <option value="information">Information</option>
	                        <option value="sortie">Sortie</option>
	                    </select></div>
	                </div>
	                <div class="col-md-4">
			        <div class="form-group">
			            <textarea class="form-control" rows="5" cols="50" name="description" required placeholder="Exprimez vous"></textarea>
                    </div>
			        <div class="form-group">
			            <center><button class="btn btn-primary" type="submit" name="submit"><span class="pencilPost"><i class="fa fa-send"></i></span>Poster</button></center>
			        </div>
			    </div>
			</div>
		</div>
	</form>

    <?php } ?>

	<?php

	include('../Controller/is_bde.php');

	// We retrieve the contents of many table
	$reponse = $conn->query('SELECT bde.id_bde , bde.type , image.nom , utilisateur.prenom , bde.date , bde.lieu ,bde.description,YEAR(date_post) as an ,MONTH (date_post) as mois , DAY(date_post) as jour ,HOUR(date_post) as heure, MINUTE(date_post) as minutes FROM utilisateur, bde, image WHERE utilisateur .id = bde .auteur AND utilisateur .id = image .id_user ORDER BY bde .id_bde DESC');

	while ($donnees = $reponse->fetch()){ // Tant que l'on a une réponse positive, la boucle fonctionne

	?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="height: 35rem;">
                    <div class="cardPhoto text-center">
                        <img class="card-img-top" src="../../assets/uploads/<?php echo $donnees['nom'];?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $donnees['prenom']; ?></h5>
                        <p class="card-text"><?php echo $donnees['description']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($donnees['date'] != NULL) { ?><li class="list-group-item"><strong>Date de l'événement : </strong><?php echo $donnees['date']; ?></li><?php } ?>
                        <li class="list-group-item"><strong>Lieu : </strong><?php echo $donnees['lieu']; ?></li>
                    </ul>
                    <div class="card-body">
                        <p class="date"><?php echo "le ".$donnees['jour']."/".$donnees['mois']."/".$donnees['an']." à ".$donnees['heure']." : ".$donnees['minutes']; ?></p>
                        






                        <?php if ($donnees['type'] == "sortie") { ?> 

                            <form action="../Controller/participe.php" method="post" data-bs-hover-animate="pulse">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <div class="form-group">
                                        <input type="checkbox" name="participe" class="custom-control-input" id="customControlAutosizing" required>
                                        <label class="custom-control-label" for="customControlAutosizing">Je viens !</label>
                                        <button class="btn btn-primary" value=<?php echo $donnees['id_bde']; ?> name="id_bde" type="submit"><span class="commentPencil"><i class="fa fa-pencil"></i></span></button> Nombre de participants : ...
                                    </div>
                                </div>
                            </form>

                            


                        <?php } ?>








                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

        $reponse2 = $conn->query('SELECT * FROM utilisateur, image, bde_com, bde WHERE utilisateur .id = image .id_user AND utilisateur .id = bde_com .id_utilisateur AND bde .id_bde = bde_com .id_bde_com ');

        while ( $donnees2 = $reponse2->fetch()){

            if ($donnees['id_bde'] == $donnees2['id_bde_com']){      

    ?>
    <div class="container-fluid commentBde">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6 commentaires">
            <p style="text-align: right; font-size:18px;"><strong><?php echo $donnees2['prenom']." - "; ?></strong><span class="date"><?php echo $donnees2['date_com']; ?></span></p>
            <p style="text-align: right; font-size: 16px;"><?php echo $donnees2['description_com']; ?></p>
        </div>
    </div>
    </div>

    <?php
            }
        }
    ?>


    <form action="../Controller/com_bde.php" method="post" data-bs-hover-animate="pulse" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-xs-1">
                    <button class="btn btn-primary" value=<?php echo $donnees['id_bde']; ?> name="id_bde_com" type="submit"><span class="commentPencil"><i class="fa fa-pencil"></i></span></button>
                </div>
                <div class="col-md-3">
                    <div class="form-group"><input type="text" id="comment" class="form-control" name="description_com" placeholder="Entrez votre commentaire"/></div>
                </div>
            </div>
        </div>
    </form>

	<?php } ?>

</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>