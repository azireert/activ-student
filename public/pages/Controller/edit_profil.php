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
            $conn->query($sql);
            header('Location: ../views/profil.php');    //envoi sur une page  
        }
    }