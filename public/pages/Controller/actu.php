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

    $description = $_POST['description'];
    $auteur = $_SESSION['id'];

    // version protégée contre les injections sql
    $sql =    //insertion des donnees dans la base de donnee
    "INSERT INTO actu (description, auteur)
    VALUES (".$conn->quote($_POST['description']).",".$conn->quote($_SESSION['id']).");
    ";

    $conn->query($sql);
    header('Location: ../views/home.php');    //envoi sur une page 

    } 

    else{
        echo ("Dommage, ça ne marche pas !");
    }