<?php
session_start();
include('../views/shared/bdd.php');

$permis = $conn->prepare("SELECT permis FROM utilisateur WHERE id = :id");
$permis->execute(array(
    'id' => $_SESSION['id']
));
$permisF = $permis->fetch();

$insertCovoit = $conn->prepare("INSERT INTO covoit (depart, arrivee, description, type) VALUES (:depart, :arrivee, :description, :type");
$insertCovoit->execute(array(
    'depart' => $_POST['depart'],
    'arrivee' => $_POST['arrivee'],
    'description' => $_POST['description'],
    'type' => $permisF['permis']
))


?>