<?php
session_start();
include('../views/shared/bdd.php');

$permis = $conn->prepare("SELECT permis FROM utilisateur WHERE id = :id");
$permis->execute(array(
    'id' => $_SESSION['id']
));
$permisF = $permis->fetch();

$insertCovoit = $conn->prepare("INSERT INTO covoit (depart, arrivee, description, type, auteur) VALUES (:depart, :arrivee, :description, :type, :auteur)");
$insertCovoit->execute(array(
    'depart' => $_POST['depart'],
    'arrivee' => $_POST['arrivee'],
    'description' => $_POST['description'],
    'type' => $permisF['permis'],
    'auteur' => $_SESSION['id']
)); 

echo $_SESSION['id'];
echo $permisF['permis'];
echo $_POST['description'];


?>