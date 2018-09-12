<?php
include '../views/shared/bdd.php';
session_start();


// Suppression des commentaire
$deleteActu_com = $conn->prepare("DELETE FROM actu_com WHERE id_actu_com = :id");
$deleteActu_com->execute(array(
    'id' => $_SESSION['id_actu']
));

// Suppression du post
$deleteActu = $conn->prepare("DELETE FROM actu WHERE id_actu = :id");
$deleteActu->execute(array(
    'id' => $_SESSION['id_actu']
));

header("location: ../views/home.php");