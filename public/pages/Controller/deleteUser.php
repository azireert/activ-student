<?php
include '../views/shared/bdd.php';
session_start();


// Les actu liées à l'utilisateur
$listeActu = $conn->prepare("SELECT * FROM actu WHERE auteur = :id");
$listeActu->execute(array(
    'id' => $_POST['delete']
));


// Parcours des actu liées à l'utilisateur
while ($listeActuF = $listeActu->fetch()){
    $deleteActu_com = $conn->prepare("DELETE FROM actu_com WHERE id_actu_com = :id");
    $deleteActu_com->execute(array(
        'id' => $listeActuF['id_actu']
    ));
}

//header("location: ../views/listeUser.php");

