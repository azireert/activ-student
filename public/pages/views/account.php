<!DOCTYPE html>
<html>

<head>
    <?php include('shared/head.php'); ?>
</head>

<body class="indexBody">

<center>
    <div class="container" >
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4 connexion">

                <form action="../Controller/inscription.php" method="post" data-bs-hover-animate="pulse">
                    <div class="illustration"><img src="../../assets/Images/profil.png" class="typcn typcn-user lock" alt="Illustration Picture"></div>
                    <div class="form-group"><input class="form-control" type="text" name="nom" required placeholder="Nom"></div>
                    <div class="form-group"><input class="form-control" type="text" name="prenom" required placeholder="Prénom"></div>
                    <div class="form-group"><input class="form-control" type="text" name="mail" required placeholder="Adresse mail"></div>
                    <div class="form-group"><input class="form-control" type="text" name="tel" required placeholder="Téléphone"></div>
                    <div class="form-group"><input class="form-control" type="text" name="age" required placeholder="Age"></div>
                    <div class="form-group"><input class="form-control" type="password" name="password" required placeholder="Mot de passe"></div>
                    <div class="form-group"><input class="form-control" type="password" name="password" required placeholder="Confirmer le mot de passe"></div>
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <div class="form-group"><input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Avez-vous le permis ?</label></div>
                    </div>
                    <div class="form-group"><input class="btn btn-primary" type="submit" name="inscription" value="Créer un compte"></div>
                    <a href="../../index.php">Vous avez déjà un compte ? Connectez-vous</a>

                </form>
                <div>
                </div>
            </div>
        </div>
</center>

</body>

</html>