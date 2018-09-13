<!DOCTYPE html>
<?php 
session_start();
include('shared/bdd.php'); ?>
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
                <h1 class="bannerTitle"><strong>Covoiturage</strong></h1>
            </div>
        </div>
    </div>
    
    <!-- Formulaire pour remplir un nouveau post en covoit -->
    <form  action ="../Controller/add_covoit.php" method="post" data-bs-hover-animate="pulse">
        <div class="container-fluid postForm">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                <div class="form-group"><input class="form-control" type="text" rows="1" cols="50" name="depart" required placeholder="ville de depart" /></div>
                <div class="form-group"><input class="form-control" type="text" rows="1" cols="50" name="arrivee" required placeholder="ville de arrivée" /></div>
                <div class="form-group"><textarea class="form-control" type="text" rows="5" cols="50" name="description" required placeholder="Description"></textarea></div>
                    <div class="form-group"><center><button class="btn btn-primary" type="submit" name="submit"><span class="pencilPost"><i class="fa fa-send"></i></span>Poster</button></center></div>

                </div>
                </div>
            </div>
    </form>


        <?php // Requête lire les covoit
        $covoit = $conn->prepare("SELECT nom ,description,depart,arrivee,tel,YEAR(date) as an ,MONTH (date) as mois , DAY(date) as jour ,HOUR(date) as heure, MINUTE(date) as minutes FROM covoit, utilisateur WHERE covoit.auteur = utilisateur.id ORDER BY date desc");
        $covoit->execute();

        //Affichage des données
        while($covoitF = $covoit->fetch()){


        ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem; height: 30rem;">
                    <div class="cardPhoto text-center">
                    <img class="card-img-top" src="../../assets/Images/profil.png" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $covoitF['nom']; ?></h5>
                        <p class="card-text"><?php echo $covoitF['description']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Départ : </strong><?php echo $covoitF['depart']; ?></li>
                        <li class="list-group-item"><strong>Arrivée : </strong><?php echo $covoitF['arrivee']; ?></li>
                        <li class="list-group-item"><strong>Téléphone : </strong><?php echo $covoitF['tel']; ?></li>
                    </ul>
                    <div class="card-body">
                        <p class="date"><?php echo "le ".$covoitF['jour']."/".$covoitF['mois']."/".$covoitF['an']." à ".$covoitF['heure']." : ".$covoitF['minutes']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d649286.8102845275!2d2.6001847156249998!3d50.52902544999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1536777972320" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

        </div>
    </div>
        <?php } ?>

    <?php include('shared/footer.php'); ?>
</body>

</html>