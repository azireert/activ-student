<?php
    session_start();
    include '../views/shared/bdd.php';

	if($_POST) {   //Creation des variables du profil si il y a un POST

    $id = $_SESSION['id'];

    $sql = "SELECT*
    FROM utilisateur
    WHERE id = ".$conn->quote($id)."";
    $stmt = $conn->executeQuery($sql);
    $row = $stmt->fetch();
    // var_dump($row['Password']);
    // echo $row;

    $description_com = $_POST['description_com'];
            
    $sql =    //insertion des donnees dans la base de donnee
        "INSERT INTO actu_com (id_utilisateur, id_actu_com, description_com)
                VALUES (".$conn->quote($_SESSION['id']).", 3, ".$conn->quote($_POST['description_com']).");
        ";

    // var_dump($sql);
    $conn->query($sql);
    header('Location: ../views/home.php');    //envoi sur une page  
    }