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
			        include('../Controller/is_bde.php');

			        // We retrieve the contents of many table
			        $reponse = $conn->query('SELECT * FROM utilisateur, bde, image WHERE utilisateur .id = bde .auteur AND utilisateur .id = image .id_user ORDER BY bde .id DESC');

			        $item = "item-1";

			        while ($donnees = $reponse->fetch()){ // While I have answer ---> I display data in a loop

			    ?>

			    <div class="container-fluid postContent">
			        <div class="row">
			            <div class="col-md-1"></div>
			            <div class="col-md-2 postPhoto text-center">
			                <img class="photoHome" src="../../assets/uploads/<?php echo $donnees['nom']; ?>">
			                <p><strong><?php echo $donnees['prenom']; ?></strong></p>
			            </div>
			            <div class="col-md-6 postBody">
			                <p class="date"><?php echo $donnees['date_post']; ?></p>
			                <p><?php echo $donnees['description']; ?></p>
			                <p>Date et heure de l'évenement : <?php echo $donnees['date']; ?></p>
			                <?php if($admin == 1 || $Bde == 1) { ?>
			                    <form action="../Controller/deleteActu.php" method="post">
			                        <button type = "submit" class = "btn btn-default btn-lg pull-right">
			                            <?php $_SESSION['id'] = $donnees['id']; ?>
			                            <span><i class="fa fa-remove"></i></span>
			                        </button>
			                    </form>
			                <?php } ?>
			            </div>
			        </div>
			    </div>

			    <?php
			        $item++;
			        }
			    ?>


            </div>
        </div>
    </div>

			</div>



		</div>
	</div>

</body>

<footer>
	<?php include('shared/footer.php'); ?>
</footer>

</html>