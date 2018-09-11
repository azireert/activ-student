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

                <form action="../controller/connexion_php.php" method="post" data-bs-hover-animate="pulse">
                    <div class="form-group"><input class="form-control" type="text" name="name_account" required placeholder="Name Account"></div>
                    <div class="form-group"><input class="form-control" type="password" name="password" required placeholder="Password"></div>
                    <div class="form-group"><input class="btn btn-primary" type="submit" name="connexion" value="Log In"></div>

                    <a href="pages/views/account.php" class="forgot">Vous n'êtes pas inscrit ? Créez un compte</a>
                </form>
                <div>
                </div>
            </div>
        </div>
</center>

</body>

</html>