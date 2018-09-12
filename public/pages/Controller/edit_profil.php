<?php
    session_start();
    include '../views/shared/bdd.php';

    if($_POST) {   //Creation des variables si il y a un POST

    $id = $_SESSION['id'];

    $sql = "SELECT*
    FROM utilisateur
    WHERE id = ".$conn->quote($id)."";
    $stmt = $conn->executeQuery($sql);
    $row = $stmt->fetch();
    // var_dump($row['Password']);
    // echo $row;

    $id_customer = $_POST['tel'];
    $title = $_POST['promo'];
    $gender = $_POST['age'];
    $first_name = $_POST['permis'];
        
        if (isset($_POST['tel']) && isset($_POST['promo']) && isset($_POST['age']) && isset($_POST['permis'])){

            // version protégée contre les injections sql
            $sql =    //insertion des donnees dans la base de donnee
            'UPDATE utilisateur SET tel="'.$_POST['tel'].'" , promo = "'.$_POST['promo'].'", age = "'.$_POST['age'].'", permis = "'.$_POST['permis'].'"';
            // var_dump($sql);




           /* $ima = "SELECT*
            FROM image
            WHERE id_user = ".$conn->quote($id)."";
            $stmt = $conn->executeQuery($ima);
            $row = $stmt->fetch();

            if (isset($_FILES['image_profil']) AND $_FILES['image_profil']['error'] == 0) { // verification si l'image est envoyé
            
            if ($_FILES['image_profil']['size'] <= 1000000) { // vérification si le fichié depasse pas 1MO

                $infosfichier = pathinfo($_FILES['image_profil']['nom']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) { // vérification de l'extension choisie

                    move_uploaded_file($_FILES['image_profil']['tmp_name'], '../../assets/uploads/' . basename($_FILES['image_profil']['nom'])); // On valide le fichier et le deplace dans un dossier pour le stocker

                    // version protégée contre les injections sql
                    $ima =    //insertion des donnees dans la base de donnee
                    'UPDATE image SET nom = "'.$_FILES['image_profil']['nom'].'" WHERE id_user = "'.$conn->quote($_SESSION['id']).'""';
                    
                    $conn->query($sql);

                    header('Location: ../views/profil.php');    //envoi sur une page  
                }
                                        else{
                                echo ("Dommage, ça ne marche pas ! 1");
                            }
            }
                                else{
                            echo ("Dommage, ça ne marche pas ! 2");
                        }
            }
                            else{
                        echo ("Dommage, ça ne marche pas ! 3");
                    }
                    */
        }
    }