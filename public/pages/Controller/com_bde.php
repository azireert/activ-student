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

    $description_com = $_POST['description_com'];
    $id_bde_com = $_POST['id_bde_com'];


    // version protégée contre les injections sql        
    $sql =    //insertion des donnees dans la base de donnee
    "INSERT INTO bde_com (id_utilisateur, id_bde_com, description_com)
    VALUES (".$conn->quote($_SESSION['id']).", ".$conn->quote($_POST['id_bde_com']).", ".$conn->quote($_POST['description_com']).");
    ";

    $conn->query($sql);
    header('Location: ../views/bde.php');    //envoi sur une page  
    
    }

    else{
        echo ("Dommage, ça ne marche pas !");
    }