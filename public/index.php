
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activ Student</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
</head> 

<body>
    
    <center>
        <div class="container" >
            <div class="row">
                <div class="col-md-4"></div>

                <div class="col-md-4 connexion">

	                <form action="../controller/connexion_php.php" method="post" data-bs-hover-animate="pulse">
		                <div class="illustration"><img src="assets/Images/cadenas.png" class="typcn typcn-user lock" alt="Illustration Picture"></div>
		                <div class="form-group"><input class="form-control" type="text" name="name_account" required placeholder="Name Account"></div>
		                <div class="form-group"><input class="form-control" type="password" name="password" required placeholder="Password"></div>
		                <div class="form-group"><input class="btn btn-primary" type="submit" name="connexion" value="Log In"></div>

                            <a href="TestNewMdp.php" class="forgot">Vous n'êtes pas inscrit ? Créez un compte</a>
		            </form>
                    <div>
                </div>
            </div>
        </div>
    </center>


</body>

</html>