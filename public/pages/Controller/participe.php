<?php
    session_start();
    include '../views/shared/bdd.php';

    if($_POST) {   //Creation des variables si il y a un POST

    	// if($_SESSION['id'] == $)




    $id = $_SESSION['id'];

    $sql = "SELECT*
    FROM utilisateur
    WHERE id = ".$conn->quote($id)."";
    $stmt = $conn->executeQuery($sql);
    $row = $stmt->fetch();

    $auteur = $_SESSION['id'];
    $id_bde = $_POST['id_bde'];

    $sql =    //insertion des donnees dans la base de donnee
    "INSERT INTO utilisateur_bde (id_utilisateur, id_bde)
    VALUES (".$conn->quote($_SESSION['id']).", ".$conn->quote($_POST['id_bde']).");
    ";

    $conn->query($sql);
    header('Location: ../views/bde.php');    //envoi sur une page  
    
    }

    else{
        echo ("Dommage, ça ne marche pas !");
    }