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


				<form  action ="../Controller/bde.php" method="post" data-bs-hover-animate="pulse">
			        <div class="container-fluid postForm">
			            <div class="row">
                            <div class="col-md-3"></div>
			                <div class="col-md-2">
			            <div class="form-group">
	                        <select class="custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
	                            <option value="B1">Information générale</option>
	                            <option value="B2">Sortie</option>
	                            <option value="B3">Vie du BDE</option>
	                        </select></div>
			                <div class="form-group"><input class="form-control" type="date" name="date" required placeholder="Date de l'évenement"></div>
			                <div class="form-group"><input class="form-control" type="text" name="lieu" required placeholder="Lieu de l'évenement"></div>
	                    </div>
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
			        $reponse = $conn->query('SELECT image.nom , utilisateur.prenom , bde.date , bde.lieu ,bde.description,YEAR(date_post) as an ,MONTH (date_post) as mois , DAY(date_post) as jour ,HOUR(date_post) as heure, MINUTE(date_post) as minutes FROM utilisateur, bde, image WHERE utilisateur .id = bde .auteur AND utilisateur .id = image .id_user ORDER BY bde .id DESC');

			        $item = "item-1";

			        while ($donnees = $reponse->fetch()){ // While I have answer ---> I display data in a loop

			    ?>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <div class="card" style="width: 50rem; height: 30rem;">
                                        <div class="cardPhoto text-center">
                                            <img class="card-img-top" src="../../assets/uploads/<?php echo $donnees['nom'];?>" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $donnees['prenom']; ?></h5>
                                            <p class="card-text"><?php echo $donnees['description']; ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Date de l'événement : </strong><?php echo $donnees['date']; ?></li>
                                            <li class="list-group-item"><strong>Lieu : </strong><?php echo $donnees['lieu']; ?></li>
                                        </ul>
                                        <div class="card-body">
                                            <p class="date"><?php echo "le ".$donnees['jour']."/".$donnees['mois']."/".$donnees['an']." à ".$donnees['heure']." : ".$donnees['minutes']; ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


			    <?php
			        }
			    ?>





</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>