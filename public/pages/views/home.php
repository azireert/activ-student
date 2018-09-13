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
    <script type="text/javascript">
        $(document).ready(function(){
            $('.collapse').collapse();
        });
    </script>


    
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
        $reponse = $conn->query('SELECT * FROM utilisateur, actu, image WHERE utilisateur .id = actu .auteur AND utilisateur .id = image .id_user ORDER BY actu .id_actu DESC');

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
                <?php if($admin == 1) { ?>
                    <form action="../Controller/deleteActu.php" method="post">
                        <button type = "submit" class = "btn btn-default btn-lg pull-right cross">
                            <?php $_SESSION['id_actu'] = $donnees['id_actu']; ?>
                            <span><i class="fa fa-remove"></i></span>
                        </button>
                    </form>
                <?php } ?>
                    <button class = "btn btn-default btn-lg pull-right cross" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" >
                        <span><i class="fa fa-comment"></i></span>
                    </button>

            </div>
            </div>
        </div>



    <?php

        $reponse2 = $conn->query('SELECT * FROM utilisateur, image, actu_com, actu WHERE utilisateur .id = image .id_user AND utilisateur .id = actu_com .id_utilisateur AND actu .id_actu = actu_com .id_actu_com ');

        while ( $donnees2 = $reponse2->fetch()){

            if ($donnees['id_actu'] == $donnees2['id_actu_com']){


    ?>
    <div class="container-fluid collapse" id="collapseExample">
    <div class="row">
        <div class="col-md-3"></div>
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


    <form action="../Controller/com_actu.php" method="post" data-bs-hover-animate="pulse" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-xs-1">
                    <button class="btn btn-primary" value=<?php echo $donnees['id_actu']; ?> name="id_actu_com" type="submit"><span class="commentPencil"><i class="fa fa-pencil"></i></span></button>
                </div>
                <div class="col-md-3">
                    <div class="form-group"><input type="text" id="comment" class="form-control" name="description_com" placeholder="Entrez votre commentaire"/></div>
                </div>
            </div>
        </div>
    </form>

                            
    <?php
        }
    ?>

    <footer>
        <?php include('shared/footer.php'); ?>
    </footer>


</body>



</html>